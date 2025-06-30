<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\PostReport;
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
            $q->where('user_id', $authUserId); // regardless of status, hide if user reported
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
                'id'          => $post->id,
                'title'       => $post->title,
                'content'     => $post->content,
                'image'       => $post->image,
                'user'        => [
                    'id'      => $post->user->id,
                    'profile' => $post->user->profile,
                ],
                'likes_count' => $post->likes->count(),
                'is_liked'    => $post->likes->where('user_id', $authUserId)->isNotEmpty(),

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

        $like = Like::where('post_id', $request->post_id)->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            ResponseService::successResponse('Post unliked.');
        } else {
            Like::create(['post_id' => $request->post_id, 'user_id' => $user->id]);
            ResponseService::successResponse('Post liked.');
        }
    }

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

        ResponseService::successResponse('Comment added successfully.', $comment);
    }

    public function likeComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment_id' => 'required|exists:comments,id',
        ]);

        if ($validator->fails()) {
            return ResponseService::validationError($validator->errors()->first());
        }

        $user = Auth::user();

        // Check if the user already liked this comment
        $like = Like::where('comment_id', $request->comment_id)
            ->where('user_id', $user->id)
            ->first();

        if ($like) {
            $like->delete();
            return ResponseService::successResponse('Comment unliked.');
        } else {
            Like::create([
                'user_id'    => $user->id,
                'comment_id' => $request->comment_id,
            ]);
            return ResponseService::successResponse('Comment liked.');
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
