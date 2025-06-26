<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{PanicTask, TaskHistory, UserProgress};
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Validator};


class PanicController extends Controller
{

    public function startPanicTask(Request $request)
    {
        try {
            $user = Auth::user();

            $preferredCategory = $user->profile->task_category;
            $preferredIntensity = $user->profile->task_intensity;

            // Allowed task categories
            $validCategories = ['mental', 'physical', 'breathing', 'habit'];

            // Determine category
            if (!$preferredCategory || $preferredCategory === 'random' || !in_array($preferredCategory, $validCategories)) {
                $category = $validCategories[array_rand($validCategories)];
                $intensity = $preferredIntensity ?? 'light'; // use user-defined or fallback to light
            } else {
                $category = $preferredCategory;

                // Default intensity mapping for known categories
                $categoryIntensities = [
                    'mental'    => 'light',
                    'physical'  => 'moderate',
                    'breathing' => 'light',
                    'habit'     => 'light',
                ];

                $intensity = $categoryIntensities[$category] ?? 'light';
            }

            // Task generation logic
            if ($category === 'mental') {
                $problem = $this->generateMathProblem();
                $taskDescription = "Solve this: " . $problem['question'];
                $correctAnswer = $problem['answer'];
            } elseif ($category === 'physical') {
                $taskDescription = 'Do 20 jumping jacks. Did you complete it?';
                $correctAnswer = true;
            } elseif ($category === 'breathing') {
                $taskDescription = 'Perform a 4-4-4-4 breathing cycle. Did you complete it?';
                $correctAnswer = true;
            } elseif ($category === 'habit') {
                $taskDescription = 'Write down 1 gratitude item.';
                $correctAnswer = null;
            }

            $task = PanicTask::create([
                'user_id'        => $user->id,
                'task_type'      => $category,
                'intensity'      => $intensity,
                'started_at'     => now(),
                'completed'      => false,
                'description'    => $taskDescription,
                'correct_answer' => $correctAnswer
            ]);

            ResponseService::successResponse('Panic task started successfully.', [
                'id'          => $task->id,
                'type'        => $category,
                'intensity'   => $intensity,
                'description' => $taskDescription
            ]);
        } catch (\Exception $e) {
            ResponseService::errorResponse('Error starting panic task.', null, 500, $e);
        }
    }

    public function completePanicTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'required|integer',
            'answer' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        try {
            $user = Auth::user();

            $task = PanicTask::where('id', $request->task_id)
                ->where('user_id', $user->id)
                ->firstOrFail();

            $userAnswer = $request->input('answer');
            $feedback = '';
            $isCorrect = false;

            // Evaluate based on task type
            switch ($task->task_type) {
                case 'mental':
                    $userAnswer = (int) $userAnswer;
                    $correctAnswer = (int) $task->correct_answer;

                    if ($userAnswer === $correctAnswer) {
                        $feedback = 'Correct! Well done.';
                        $isCorrect = true;
                    } else {
                        $feedback = 'Wrong answer. Try again next time!';
                    }
                    break;

                case 'physical':
                case 'breathing':
                case 'habit':
                    $feedback = 'Task completed successfully.';
                    $isCorrect = true;
                    break;

                default:
                    $feedback = 'Task marked as complete.';
                    $isCorrect = true;
                    break;
            }

            // Update panic task
            $task->update([
                'completed'    => true,
                'completed_at' => now(),
                'notes'        => $feedback,
            ]);

            // Update or create task history
            TaskHistory::updateOrCreate(
                [
                    'user_id'         => $user->id,
                    'task_type'       => $task->task_type,
                    'task_description' => $task->description,
                ],
                [
                    'completed_at' => now(),
                    'notes'        => $feedback,
                    'is_correct'   => $isCorrect,
                ]
            );

            // Update user progress panic_action flag
            UserProgress::updateOrCreate(
                ['user_id' => $user->id],
                ['panic_action' => true]
            );

            ResponseService::successResponse($feedback, $task);
        } catch (\Exception $e) {
            ResponseService::errorResponse('Error completing panic task.', null, 500, $e);
        }
    }

    private function generateMathProblem()
    {
        $num1 = rand(1, 99);
        $num2 = rand(1, 99);
        $question = "{$num1} x {$num2}";
        $answer = $num1 * $num2;

        return ['question' => $question, 'answer' => $answer];
    }

    public function myTasks()
    {

        $user = Auth::user();
        $taskHistory = TaskHistory::where(['user_id' => $user->id, 'is_correct' => 1])->with('user')->get();

        ResponseService::successResponse(
            'Completed tasks retrieved successfully.',
            $taskHistory
        );
    }
}
