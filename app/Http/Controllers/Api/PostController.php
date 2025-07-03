<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\PostReport;
use App\Models\User;
use App\Services\NotificationService;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        try {
            $user = Auth::user();

            $imagePath = null;
            if ($request->hasFile('image')) {
                $fileName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('uploads/community'), $fileName);
                $imagePath = 'uploads/community/' . $fileName;
            }

            $post = Post::create([
                'user_id' => $user->id,
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath
            ]);

            ResponseService::successResponse('Post created successfully.', $post);
        } catch (\Exception $e) {
            ResponseService::errorResponse('Failed to create post.', null, 500, $e);
        }
    }

    public function getAllPosts()
    {
        $authUserId = Auth::id();

        $posts = Post::whereDoesntHave('reports', function ($q) use ($authUserId) {
            $q->where('user_id', $authUserId);
        })->with([
            'user.profile',
            'likes' => function ($query) {
                $query->whereNotNull('post_id');
            },
            'comments.user.profile',
            'comments.likes' => function ($query) {
                $query->whereNotNull('comment_id');
            }
        ])->latest()->get()->map(function ($post) use ($authUserId) {
            return [
                'id'             => $post->id,
                'title'          => $post->title,
                'content'        => $post->content,
                'image'          => $post->image,
                'user'           => [
                    'id'      => $post->user->id,
                    'profile' => $post->user->profile,
                ],
                'likes_count'    => $post->likes->count(),
                'comments_count' => $post->comments->count(),
                'is_liked'       => $post->likes->where('user_id', $authUserId)->isNotEmpty(),

                'comments' => $post->comments->map(function ($comment) use ($authUserId) {
                    return [
                        'id'          => $comment->id,
                        'comment'     => $comment->comment,
                        'user'        => [
                            'id'      => $comment->user->id,
                            'name'    => $comment->user->name,
                            'profile' => $comment->user->profile,
                        ],
                        'likes_count' => $comment->likes->count(),
                        'is_liked'    => $comment->likes->where('user_id', $authUserId)->isNotEmpty(),
                        'created_at'  => $comment->created_at->toDateTimeString(),
                    ];
                }),

                'created_at' => $post->created_at->toDateTimeString(),
            ];
        });

        ResponseService::successResponse('Posts fetched successfully.', $posts);
    }

    public function getSinglePost($id)
    {
        try {
            $userId = Auth::id();

            $post = Post::whereDoesntHave('reports', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })->with([
                'user.profile',
                'likes',
                'comments.user.profile',
                'comments.likes'
            ])->findOrFail($id);

            $formattedPost = [
                'id'             => $post->id,
                'title'          => $post->title,
                'content'        => $post->content,
                'image'          => $post->image,
                'created_at'     => $post->created_at->toDateTimeString(),
                'total_likes'    => $post->likes->count(),
                'total_comments' => $post->comments->count(),
                'is_liked'       => $post->likes->contains('user_id', $userId),
                'user'           => [
                    'id'     => $post->user->id,
                    'name' => $post->user->profile->name,
                    'avatar' => optional($post->user->profile)->avatar,
                ],
                'comments' => $post->comments->map(function ($comment) use ($userId) {
                    return [
                        'id'           => $comment->id,
                        'comment'      => $comment->comment,
                        'created_at'   => $comment->created_at->toDateTimeString(),
                        'total_likes'  => $comment->likes->count(),
                        'is_liked'     => $comment->likes->contains('user_id', $userId),
                        'user'         => [
                            'id'     => $comment->user->id,
                            'name' => $comment->user->profile->name,
                            'avatar' => optional($comment->user->profile)->avatar,
                        ]
                    ];
                })
            ];

            ResponseService::successResponse('Post fetched successfully.', $formattedPost);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            ResponseService::errorResponse('Post not found.', [], 404);
        } catch (\Exception $e) {
            ResponseService::errorResponse('Something went wrong.', [], 500, $e->getMessage());
        }
    }

    public function likePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id'
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }
        $user = Auth::user();
        $post = Post::find($request->post_id);
        $postOwner = $post->user;
        $like = Like::where('post_id', $request->post_id)->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();

            NotificationService::sendFcmNotification(
                [$postOwner->device_token],
                'Post Unliked',
                $user->name . ' unliked your post: ' . $post->title,
                [
                    'user_id' => $postOwner->id,
                    'sender_id' => $user->id,
                    'related_id' => $post->id,
                    'related_type' => 'Post',
                    'type' => 'unlike',
                ]
            );
            ResponseService::successResponse('Post unliked.');
        } else {
            Like::create(['post_id' => $request->post_id, 'user_id' => $user->id]);

            // Send notification for liking
            NotificationService::sendFcmNotification(
                [$postOwner->device_token],
                'Post Liked',
                $user->name . ' liked your post: ' . $post->title,
                [
                    'user_id' => $postOwner->id,           // receiver (who gets notification)
                    'sender_id' => $user->id,              // actor (who liked the post)
                    'related_id' => $post->id,
                    'related_type' => 'Post',
                    'type' => 'like',
                ]
            );
            ResponseService::successResponse('Post liked.');
        }
    }

    // public function addComment(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'post_id' => 'required|exists:posts,id',
    //         'comment' => 'required|string'
    //     ]);

    //     if ($validator->fails()) {
    //         ResponseService::validationError($validator->errors()->first());
    //     }

    //     $user = Auth::user();

    //     $comment = Comment::create([
    //         'post_id' => $request->post_id,
    //         'user_id' => $user->id,
    //         'comment' => $request->comment
    //     ]);

    //     // Get the post owner and all users who have commented on this post
    //     $postOwner = $comment->post->user; // Post owner
    //     $commenters = Comment::where('post_id', $request->post_id)
    //         ->where('user_id', '!=', $user->id) // Exclude the current user who is commenting
    //         ->pluck('user_id'); // Get other users who have commented

    //     // Send notification to the post owner
    //     NotificationService::sendFcmNotification(
    //         [$postOwner->device_token], // Send to the post owner
    //         'New Comment on Your Post',
    //         $user->name . ' commented on your post: ' . $comment->post->title,
    //         [
    //             'user_id' => $user->id,
    //             'related_id' => $comment->post_id,
    //             'related_type' => 'Post',
    //             'type' => 'comment'
    //         ]
    //     );

    //     // Send notification to other users who commented on the same post
    //     foreach ($commenters as $commenterId) {
    //         $commenter = User::find($commenterId);
    //         if ($commenter) {
    //             NotificationService::sendFcmNotification(
    //                 [$commenter->device_token], // Send to the user who commented on the post
    //                 'New Comment on Post You Commented On',
    //                 $user->name . ' added a new comment to the post you commented on: ' . $comment->post->title,
    //                 [
    //                     'user_id' => $user->id,
    //                     'related_id' => $comment->post_id,
    //                     'related_type' => 'Post',
    //                     'type' => 'comment'
    //                 ]
    //             );
    //         }
    //     }

    //     ResponseService::successResponse('Comment added successfully.', $comment);
    // }

    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string'
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        $user = Auth::user();

        $comment = Comment::create([
            'post_id' => $request->post_id,
            'user_id' => $user->id,
            'comment' => $request->comment
        ]);

        $post = $comment->post;
        $postOwner = $post->user;

        // Notify post owner if not the one commenting
        if ($postOwner->id !== $user->id) {
            NotificationService::sendFcmNotification(
                [$postOwner->device_token],
                'New Comment on Your Post',
                $user->name . ' commented on your post: ' . $post->title,
                [
                    'user_id' => $postOwner->id, // 👈 recipient
                    'sender_id' => $user->id,     // 👈 sender
                    'related_id' => $post->id,
                    'related_type' => 'Post',
                    'type' => 'comment'
                ]
            );
        }

        // Notify other commenters (except the current user and post owner)
        $commenterIds = Comment::where('post_id', $post->id)
            ->whereNotIn('user_id', [$user->id, $postOwner->id])
            ->distinct()
            ->pluck('user_id');

        foreach ($commenterIds as $commenterId) {
            $commenter = User::find($commenterId);
            if ($commenter && $commenter->device_token) {
                NotificationService::sendFcmNotification(
                    [$commenter->device_token],
                    'New Comment on a Post You Commented On',
                    $user->name . ' also commented on the post: ' . $post->title,
                    [
                        'user_id' => $commenter->id, // 👈 recipient
                        'sender_id' => $user->id,     // 👈 sender
                        'related_id' => $post->id,
                        'related_type' => 'Post',
                        'type' => 'comment'
                    ]
                );
            }
        }

        ResponseService::successResponse('Comment added successfully.', $comment);
    }


    // public function likeComment(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'comment_id' => 'required|exists:comments,id',
    //     ]);

    //     if ($validator->fails()) {
    //         return ResponseService::validationError($validator->errors()->first());
    //     }

    //     $user = Auth::user();
    //     // Fetch the comment owner
    //     $comment = Comment::findOrFail($request->comment_id);
    //     $commentOwner = $comment->user; // The user who created the comment
    //     // Check if the user already liked this comment
    //     $like = Like::where('comment_id', $request->comment_id)
    //         ->where('user_id', $user->id)
    //         ->first();

    //     if ($like) {
    //         $like->delete();
    //         // Send notification to the comment owner
    //         NotificationService::sendFcmNotification(
    //             [$commentOwner->device_token], // Send to the comment owner
    //             'Comment Unliked',
    //             $user->name . ' unliked your comment.',
    //             [
    //                 'user_id' => $user->id,
    //                 'related_id' => $comment->id,
    //                 'related_type' => 'Comment',
    //                 'type' => 'unlike'
    //             ]
    //         );
    //         return ResponseService::successResponse('Comment unliked.');
    //     } else {
    //         Like::create([
    //             'user_id'    => $user->id,
    //             'comment_id' => $request->comment_id,
    //         ]);

    //         // Send notification to the comment owner
    //         NotificationService::sendFcmNotification(
    //             [$commentOwner->device_token], // Send to the comment owner
    //             'Comment Liked',
    //             $user->name . ' liked your comment.',
    //             [
    //                 'user_id' => $user->id,
    //                 'related_id' => $comment->id,
    //                 'related_type' => 'Comment',
    //                 'type' => 'like'
    //             ]
    //         );
    //         return ResponseService::successResponse('Comment liked.');
    //     }
    // }


    public function likeComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment_id' => 'required|exists:comments,id',
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        $user = Auth::user();

        // Fetch the comment and owner
        $comment = Comment::findOrFail($request->comment_id);
        $commentOwner = $comment->user;

        // Check if already liked
        $like = Like::where('comment_id', $request->comment_id)
            ->where('user_id', $user->id)
            ->first();

        if ($like) {
            $like->delete();

            // Send "unlike" notification to comment owner (if not self)
            if ($commentOwner->id !== $user->id && $commentOwner->device_token) {
                NotificationService::sendFcmNotification(
                    [$commentOwner->device_token],
                    'Comment Unliked',
                    $user->name . ' unliked your comment.',
                    [
                        'user_id' => $commentOwner->id,
                        'sender_id' => $user->id,
                        'related_id' => $comment->id,
                        'related_type' => 'Comment',
                        'type' => 'unlike'
                    ]
                );
            }

            ResponseService::successResponse('Comment unliked.');
        } else {
            Like::create([
                'user_id'    => $user->id,
                'comment_id' => $request->comment_id,
            ]);

            // Send "like" notification to comment owner (if not self)
            if ($commentOwner->id !== $user->id && $commentOwner->device_token) {
                NotificationService::sendFcmNotification(
                    [$commentOwner->device_token],
                    'Comment Liked',
                    $user->name . ' liked your comment.',
                    [
                        'user_id' => $commentOwner->id,
                        'sender_id' => $user->id,
                        'related_id' => $comment->id,
                        'related_type' => 'Comment',
                        'type' => 'like'
                    ]
                );
            }

            ResponseService::successResponse('Comment liked.');
        }
    }


    public function reportPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id',
            'reason'  => 'required|string'
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        $user = Auth::user();

        $existing = PostReport::where('post_id', $request->post_id)->where('user_id', $user->id)->first();
        if ($existing) {
            ResponseService::errorResponse('You have already reported this post.', null, 409);
        }

        $report = PostReport::create([
            'post_id' => $request->post_id,
            'user_id' => $user->id,
            'reason'  => $request->reason
        ]);

        ResponseService::successResponse('Post reported successfully.', $report);
    }
}
