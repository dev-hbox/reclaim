<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::latest()->paginate(10);
        return view('dashboard.lessons.index', compact('lessons'));
    }

    public function store(Request $request)
    {
        // Validate individual file types
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv,flv|max:204800',
        ]);

        // Check if both avatar and video are missing
        if (!$request->hasFile('avatar') && !$request->hasFile('video')) {
            return redirect()->back()->withErrors(['media' => 'Please upload either an image or a video.'])->withInput();
        }

        $avatar = '';
        $video = '';

        if ($request->hasFile('avatar')) {
            $avatarFilename = time() . '_avatar.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('/uploads/lesson/'), $avatarFilename);
            $avatar = '/uploads/lesson/' . $avatarFilename;
        }

        if ($request->hasFile('video')) {
            $videoFilename = time() . '_video.' . $request->video->getClientOriginalExtension();
            $request->video->move(public_path('/uploads/lesson/videos/'), $videoFilename);
            $video = '/uploads/lesson/videos/' . $videoFilename;
        }

        Lesson::create([
            'title' => $request->title,
            'description' => $request->description,
            'avatar' => $avatar,
            'video' => $video,
        ]);

        return redirect()->back()->with('success', 'Lesson created successfully!');
    }

    public function lessonUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv,flv|max:204800',
        ]);

        $lesson = Lesson::findOrFail($id);

        $hasAvatar = $request->hasFile('avatar');
        $hasVideo = $request->hasFile('video');

        if ($hasAvatar && $hasVideo) {
            return redirect()->back()
                ->withErrors(['media' => 'Please upload only one file: either an image or a video.'])
                ->withInput();
        }

        $avatar = $lesson->avatar;
        $video = $lesson->video;

        if ($hasAvatar) {
            // Delete existing video if it exists
            if ($lesson->video && file_exists(public_path($lesson->video))) {
                unlink(public_path($lesson->video));
                $video = ''; // Clear video field if replacing with image
            }

            // Delete old avatar if exists
            if ($lesson->avatar && file_exists(public_path($lesson->avatar))) {
                unlink(public_path($lesson->avatar));
            }

            $avatarFilename = time() . '_avatar.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('/uploads/lesson/'), $avatarFilename);
            $avatar = '/uploads/lesson/' . $avatarFilename;
        }

        if ($hasVideo) {
            // Delete existing avatar if it exists
            if ($lesson->avatar && file_exists(public_path($lesson->avatar))) {
                unlink(public_path($lesson->avatar));
                $avatar = ''; // Clear avatar field if replacing with video
            }

            // Delete old video if exists
            if ($lesson->video && file_exists(public_path($lesson->video))) {
                unlink(public_path($lesson->video));
            }

            $videoFilename = time() . '_video.' . $request->video->getClientOriginalExtension();
            $request->video->move(public_path('/uploads/lesson/videos/'), $videoFilename);
            $video = '/uploads/lesson/videos/' . $videoFilename;
        }

        $lesson->update([
            'title' => $request->title,
            'description' => $request->description,
            'avatar' => $avatar,
            'video' => $video,
        ]);

        return redirect()->back()->with('success', 'Lesson updated successfully!');
    }


    public function lessonDelete($id)
    {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return redirect()->back()->with('danger', 'Lesson not found.');
        }

        // Delete avatar if exists
        if ($lesson->avatar && file_exists(public_path($lesson->avatar))) {
            unlink(public_path($lesson->avatar));
        }

        // Delete video if exists
        if ($lesson->video && file_exists(public_path($lesson->video))) {
            unlink(public_path($lesson->video));
        }

        $lesson->delete();

        return redirect()->back()->with('success', 'Lesson deleted successfully.');
    }
}
