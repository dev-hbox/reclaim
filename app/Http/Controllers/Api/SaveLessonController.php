<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SaveLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SaveLessonController extends Controller
{
    public function saveLesson(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lesson_id' => 'required|exists:lessons,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $authUser = Auth::user();
        $lessonId = $request->lesson_id;

        // Check if the lesson is already saved
        $savedLesson = SaveLesson::where('user_id', $authUser->id)
            ->where('lesson_id', $lessonId)
            ->first();

        if ($savedLesson) {
            $savedLesson->delete();
            return response()->json([
                'success' => true,
                'message' => 'Lesson removed from saved list.'
            ], 200);
        } else {
            $newSavedLesson = SaveLesson::create([
                'user_id' => $authUser->id,
                'lesson_id' => $lessonId,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Lesson saved successfully.',
                'data' => $newSavedLesson
            ], 200);
        }
    }


    public function saveLessonList()
    {
        $user = Auth::user();
        $saveLesson = SaveLesson::where("user_id", $user->id)
            ->with('lesson')
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Saved Lesson show successfully.',
            'data'    => $saveLesson
        ], 200);
    }
}
