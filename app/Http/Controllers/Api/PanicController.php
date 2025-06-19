<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PanicTask;
use App\Models\TaskHistory;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PanicController extends Controller
{

    public function startPanicTask(Request $request)
    {
        try {
            $user = Auth::user();

            $preferredCategory = $user->profile->task_category;
            $preferredIntensity = $user->profile->task_intensity;

            $categoryIntensities = [
                'mental' => 'light',
                'physical' => 'moderate',
                'breathing' => 'light',
                'habit' => 'light',
                'random' => $preferredIntensity ?: 'light',
            ];

            $category = $preferredCategory ?: 'random';
            $intensity = $categoryIntensities[$category] ?? 'light';

            // Generate task description based on category
            if ($category === 'mental') {
                $problem = $this->generateMathProblem();
                $taskDescription = "Solve this: " . $problem['question'];
                $correctAnswer = $problem['answer']; // Store the correct answer for comparison
            } elseif ($category === 'physical') {
                $taskDescription = 'Do 20 jumping jacks. Did you complete it?';
                $correctAnswer = true; // Set as true for physical confirmation
            } elseif ($category === 'breathing') {
                $taskDescription = 'Perform a 4-4-4-4 breathing cycle. Did you complete it?';
                $correctAnswer = true;
            } elseif ($category === 'habit') {
                $taskDescription = 'Write down 1 gratitude item.';
                $correctAnswer = null; // No specific answer for habit tasks
            } elseif ($category === 'interactive') {
                $taskDescription = 'Scan a random item’s barcode.';
                $correctAnswer = null; // No answer needed for scanning tasks
            } else {
                $taskDescription = 'Stay focused – you’ve got this!';
                $correctAnswer = null; // Default for random
            }

            // Create the panic task
            $task = PanicTask::create([
                'user_id'    => $user->id,
                'task_type'  => $category,
                'intensity'  => $intensity,
                'started_at' => now(),
                'completed'  => false,
                'description' => $taskDescription,
                'correct_answer' => $correctAnswer
            ]);

            return response()->json([
                'success' => true,
                'task' => [
                    'id'        => $task->id,
                    'type'      => $category,
                    'description' => $taskDescription
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error starting panic task: ' . $e->getMessage(),
                'error'   => $e->getTraceAsString()
            ], 500);
        }
    }

    public function completePanicTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_id' => 'required|required|integer',
            'answer' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Validation failed.',
                'data' => $validator->errors(),
            ], 422);
        }
        try {

            $user = Auth::user();
            $task = PanicTask::where('id', $request->task_id)->where('user_id', $user->id)->firstOrFail();

            $userAnswer = $request->input('answer');
            $feedback = '';

            $userAnswer = (int)$userAnswer;
            $correctAnswer = (int)$task->correct_answer;

            if ($task->task_type === 'mental') {
                if ($userAnswer === $correctAnswer) {
                    $feedback = 'Correct! Well done.';
                    $isCorrect = true;
                } else {
                    $feedback = 'Wrong answer. Try again next time!';
                    $isCorrect = false;
                }
            } elseif ($task->task_type === 'physical' || $task->task_type === 'breathing' || $task->task_type === 'habit' || $task->task_type === 'interactive') {
                $feedback = 'Task completed successfully.';
                $isCorrect = true;
            }

            $task->update([
                'completed'    => true,
                'completed_at' => now(),
                'notes'        => $feedback,
            ]);

            // Find existing task history and update it
            $taskHistory = TaskHistory::where('user_id', $user->id)
                ->where('task_type', $task->task_type)
                ->where('task_description', $task->description)
                ->first();

            if ($taskHistory) {
                $taskHistory->update([
                    'completed_at' => now(),
                    'notes'         => $feedback,
                    'is_correct'    => $isCorrect,
                ]);
            } else {
                TaskHistory::create([
                    'user_id'        => $user->id,
                    'task_type'      => $task->task_type,
                    'task_description' => $task->description,
                    'completed_at'   => now(),
                    'notes'          => $feedback,
                    'is_correct'     => $isCorrect,
                ]);
            }

            UserProgress::updateOrCreate(
                ['user_id' => $user->id],
                ['panic_action' => true]
            );

            return response()->json([
                'success' => true,
                'message' => $feedback,
                'task'    => $task
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error completing panic task: ' . $e->getMessage(),
            ], 500);
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

        return response()->json([
            'success' => true,
            'message' => "",
            'data' => $taskHistory
        ]);
    }
}
