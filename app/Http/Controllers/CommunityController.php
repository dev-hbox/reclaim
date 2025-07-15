<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostReport;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function getAllPosts()
    {
        $authUserId = Auth::id();

        $posts = Post::with([
            'reports',
            'user.profile',
            'likes' => function ($query) {
                $query->whereNotNull('post_id');
            },
            'comments.user.profile',
            'comments.likes' => function ($query) {
                $query->whereNotNull('comment_id');
            }
        ])
            ->latest()
            ->paginate(10);


        // Transform paginated items
        $posts->getCollection()->transform(function ($post) use ($authUserId) {
            return [
                'id'             => $post->id,
                'title'          => $post->title,
                'content'        => $post->content,
                'image'          => $post->image ? asset($post->image) : null,
                'user'           => [
                    'id'      => $post->user->id,
                    'profile' => $post->user->profile,
                ],
                'likes_count'    => $post->likes->count(),
                'comments_count' => $post->comments->count(),
                'is_liked'       => $post->likes->where('user_id', $authUserId)->isNotEmpty(),
                'is_report'      => $post->reports->isNotEmpty() ? 1 : 0,


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

        return view('dashboard.community.index', compact('posts'));
    }


    public function getReportedPosts()
    {
        $reports = PostReport::with([
            'post.user.profile',
            'user.profile'
        ])
            ->latest()
            ->paginate(10);

        $reports->getCollection()->transform(function ($report) {
            return [
                'report_id' => $report->id,
                'reason'    => $report->reason,
                'status'    => $report->status,
                'created_at' => $report->created_at->toDateTimeString(),

                'reported_by' => [
                    'id'      => $report->user->id,
                    'email'    => $report->user->email,
                    'profile' => $report->user->profile,
                ],

                'post' => [
                    'id'        => $report->post->id,
                    'title'     => $report->post->title,
                    'content'   => $report->post->content,
                    'image'     => $report->post->image ? asset($report->post->image) : null,
                    'created_by' => [
                        'id'      => $report->post->user->id,
                        'email'    => $report->post->user->email,
                        'profile' => $report->post->user->profile,
                    ],
                    'created_at' => $report->post->created_at->toDateTimeString(),
                ]
            ];
        });

        return view('dashboard.community.report-posts', compact('reports'));
    }

    public function toggleReportStatus($id, $action)
    {
        $report = PostReport::find($id);

        if (!$report) {
            return redirect()->back()->with('danger', 'Report not found.');
        }

        if (!in_array($action, ['approve', 'reject'])) {
            return redirect()->back()->with('danger', 'Invalid action.');
        }

        if ($action === 'approve') {
            $report->status = 'approved';
            $report->save();

            $message = 'Report approved and post deleted successfully.';
            $alertType = 'success';
        } else {
            $report->status = 'rejected';
            $report->save();

            $message = 'Report rejected successfully.';
            $alertType = 'warning';
        }

        return redirect()->back()->with($alertType, $message);
    }
}
