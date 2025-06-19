<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\SaveLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function allLessons()
    {
        $authUser = Auth::user();
        $lessons = Lesson::all()->map(function ($lesson) use ($authUser) {
            $isSaved = SaveLesson::where('user_id', $authUser->id)
                ->where('lesson_id', $lesson->id)
                ->exists();

            // Append is_save field
            $lesson->is_save = $isSaved ? 1 : 0;
            return $lesson;
        });

        return response()->json([
            'success' => true,
            'message' => 'Lessons retrieved successfully.',
            'data' => $lessons,
        ], 200);
    }
}
