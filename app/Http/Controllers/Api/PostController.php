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
            'title' => 'required|string',
            'content' => 'required|string',
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
        $posts = Post::with('user.profile', 'comments', 'likes')->latest()->get();

        ResponseService::successResponse('Posts fetched successfully.', $posts);
    }

    public function getSinglePost($id)
    {
        try {
            $post = Post::with([
                'user:id,name',
                'comments.user:id,name',
                'likes'
            ])->findOrFail($id);

            ResponseService::successResponse('Post fetched successfully.', $post);
        } catch (\Exception $e) {
            ResponseService::errorResponse('Post not found.', null, 404, $e);
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
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string'
        ]);

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
        $request->validate(['comment_id' => 'required|exists:comments,id']);

        $user = Auth::user();

        $like = Comment::where('comment_id', $request->comment_id)->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            ResponseService::successResponse('Comment unliked.');
        } else {
            Comment::create(['comment_id' => $request->comment_id, 'user_id' => $user->id]);
            ResponseService::successResponse('Comment liked.');
        }
    }

    public function reportPost(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'reason'  => 'required|string'
        ]);

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

        return ResponseService::successResponse('Post reported successfully.', $report);
    }
}
