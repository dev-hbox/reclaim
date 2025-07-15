<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\SaveLesson;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Validator};


class SaveLessonController extends Controller
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
        ResponseService::successResponse('Lessons retrieved successfully.', $lessons);
    }

    public function saveLesson(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'lesson_id' => 'required|exists:lessons,id'
            ]);

            if ($validator->fails()) {
                ResponseService::validationError($validator->errors()->first());
            }

            $authUser = Auth::user();
            $lessonId = $request->lesson_id;

            // Check if the lesson is already saved
            $savedLesson = SaveLesson::where('user_id', $authUser->id)
                ->where('lesson_id', $lessonId)
                ->first();

            if ($savedLesson) {
                $savedLesson->delete();
                ResponseService::successResponse('Lesson removed from saved list.');
            } else {
                $newSavedLesson = SaveLesson::create([
                    'user_id' => $authUser->id,
                    'lesson_id' => $lessonId,
                ]);

                ResponseService::successResponse('Lesson saved successfully.', $newSavedLesson);
            }
        } catch (\Exception $e) {
            ResponseService::errorResponse('Error saving lesson.', null, 500, $e);
        }
    }

    public function saveLessonList()
    {
        $user = Auth::user();
        $saveLesson = SaveLesson::where("user_id", $user->id)
            ->with('lesson')
            ->get();
        ResponseService::successResponse('Saved Lesson show successfully.', $saveLesson);
    }
}
