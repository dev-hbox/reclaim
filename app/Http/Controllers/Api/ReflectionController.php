<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DailyReflection;
use App\Models\UserProgress;
use App\Services\NotificationService;
use App\Services\ResponseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReflectionController extends Controller
{
    // public function store(Request $request)
    // {

    //     try {
    //         // Validate the request data
    //         $request->validate([
    //             'is_victory' => 'required|boolean',
    //             'temptation_level' => 'nullable|integer|min:0|max:10',
    //             'temptation_label' => 'nullable|in:low,medium,high',
    //             'time_of_day' => 'nullable|in:morning,afternoon,evening,night',
    //             'triggers' => 'nullable|string',
    //             'notes' => 'nullable|string',
    //         ]);

    //         $user = Auth::user();
    //         $date = Carbon::now()->toDateString();

    //         // Check if reflection already exists for today
    //         if (DailyReflection::where('user_id', $user->id)->where('date', $date)->exists()) {
    //             ResponseService::errorResponse('Reflection already submitted for today.', null, 400);
    //         }

    //         // Save the reflection
    //         $reflection = DailyReflection::create([
    //             'user_id' => $user->id,
    //             'date' => $date,
    //             'is_victory' => $request->is_victory,
    //             'temptation_level' => $request->temptation_level,
    //             'temptation_label' => $request->temptation_label,
    //             'time_of_day' => $request->time_of_day,
    //             'triggers' => $request->triggers,
    //             'notes' => $request->notes,
    //         ]);

    //         // Fetch or create user progress
    //         $progress = UserProgress::firstOrCreate(
    //             ['user_id' => $user->id],
    //             ['points' => 0, 'level' => 1, 'rank' => 1, 'streak_days' => 0, 'missed_checkins' => 0]
    //         );

    //         // Calculate today's points
    //         $points = 0;
    //         if ($request->is_victory) {
    //             $points += 5; // Victory points
    //             $points += ($request->temptation_level ?? 0) * 0.5; // Temptation bonus
    //             $progress->streak_days += 1; // Increment streak
    //             $progress->missed_checkins = 0; // Reset missed check-ins
    //         } else {
    //             $points -= 3; // Penalty for setback
    //             $progress->streak_days = 0; // Reset streak on setback
    //         }

    //         // Check-in bonus
    //         $points += 1;

    //         // Update points, ensure it doesn't go below 0
    //         $progress->points = max(0, $progress->points + $points);

    //         // Level Thresholds (Cumulative points required for each level)
    //         $levelThresholds = [
    //             1 => 50,   // Level 1 to Level 2
    //             2 => 150,  // Level 2 to Level 3
    //             3 => 300,  // Level 3 to Level 4
    //             4 => 500,  // Level 4 to Level 5
    //             5 => 750,  // Level 5 to Level 6
    //             6 => 1050, // Level 6 to Level 7
    //             7 => 1400  // Level 7 (Mastery) - Maintenance of points per month
    //         ];

    //         // Check if the user should progress to the next level based on their points
    //         $newLevel = $progress->level;

    //         // Loop through level thresholds to find the appropriate level
    //         foreach ($levelThresholds as $level => $threshold) {
    //             if ($progress->points >= $threshold) {
    //                 $newLevel = $level; // Update the level if points exceed the threshold
    //             }
    //         }

    //         // If the new level is greater than the current level, update it
    //         if ($newLevel > $progress->level) {
    //             $progress->level = $newLevel;
    //         }

    //         // Check for relapse (5 setbacks in the last 7 days)
    //         $last7 = DailyReflection::where('user_id', $user->id)
    //             ->orderByDesc('date')
    //             ->limit(7)
    //             ->pluck('is_victory');

    //         $setbacks = $last7->filter(fn($v) => !$v)->count();
    //         if ($setbacks >= 5 && $progress->level > 1) {
    //             $progress->level -= 1; // Drop the level if too many setbacks
    //         }

    //         // Save updated progress
    //         $progress->save();

    //         // Return the response with updated reflection and progress
    //         ResponseService::successResponse(
    //             'Reflection recorded. Progress updated.',
    //             ['reflection' => $reflection, 'progress'   => $progress]
    //         );
    //     } catch (\Exception $e) {
    //         ResponseService::errorResponse('Something went wrong while saving the reflection.', null, 500, $e);
    //     }
    // }


    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'is_victory' => 'required|boolean',
                'temptation_level' => 'nullable|integer|min:0|max:10',
                'temptation_label' => 'nullable|in:low,medium,high',
                'time_of_day' => 'nullable|in:morning,afternoon,evening,night',
                'triggers' => 'nullable|string',
                'notes' => 'nullable|string',
            ]);

            $user = Auth::user();
            $date = Carbon::now()->toDateString();

            // Check if reflection already exists for today
            if (DailyReflection::where('user_id', $user->id)->where('date', $date)->exists()) {
                ResponseService::errorResponse('Reflection already submitted for today.', null, 400);
            }

            // Save the reflection
            $reflection = DailyReflection::create([
                'user_id' => $user->id,
                'date' => $date,
                'is_victory' => $request->is_victory,
                'temptation_level' => $request->temptation_level,
                'temptation_label' => $request->temptation_label,
                'time_of_day' => $request->time_of_day,
                'triggers' => $request->triggers,
                'notes' => $request->notes,
            ]);

            // Fetch or create user progress
            $progress = UserProgress::firstOrCreate(
                ['user_id' => $user->id],
                ['points' => 0, 'level' => 1, 'rank' => 1, 'streak_days' => 0, 'missed_checkins' => 0]
            );

            // Calculate today's points
            $points = 0;
            if ($request->is_victory) {
                $points += 5; // Victory points
                $points += ($request->temptation_level ?? 0) * 0.5; // Temptation bonus
                $progress->streak_days += 1; // Increment streak
                $progress->missed_checkins = 0; // Reset missed check-ins
            } else {
                $points -= 3; // Penalty for setback
                $progress->streak_days = 0; // Reset streak on setback
            }

            // Check-in bonus
            $points += 1;

            // Update points, ensure it doesn't go below 0
            $progress->points = max(0, $progress->points + $points);

            // Level Thresholds (Cumulative points required for each level)
            $levelThresholds = [
                1 => 50,   // Level 1 to Level 2
                2 => 150,  // Level 2 to Level 3
                3 => 300,  // Level 3 to Level 4
                4 => 500,  // Level 4 to Level 5
                5 => 750,  // Level 5 to Level 6
                6 => 1050, // Level 6 to Level 7
                7 => 1400  // Level 7 (Mastery) - Maintenance of points per month
            ];

            // Check if the user should progress to the next level based on their points
            $newLevel = $progress->level;

            // Loop through level thresholds to find the appropriate level
            foreach ($levelThresholds as $level => $threshold) {
                if ($progress->points >= $threshold) {
                    $newLevel = $level; // Update the level if points exceed the threshold
                }
            }

            // If the new level is greater than the current level, update it
            if ($newLevel > $progress->level) {
                $progress->level = $newLevel;

                // Send notification for level upgrade
                $this->sendLevelChangeNotification($user, $newLevel);
            }

            // Check for relapse (5 setbacks in the last 7 days)
            $last7 = DailyReflection::where('user_id', $user->id)
                ->orderByDesc('date')
                ->limit(7)
                ->pluck('is_victory');

            $setbacks = $last7->filter(fn($v) => !$v)->count();
            if ($setbacks >= 5 && $progress->level > 1) {
                $progress->level -= 1; // Drop the level if too many setbacks

                // Send notification for level downgrade
                $this->sendLevelChangeNotification($user, $progress->level);
            }

            // Save updated progress
            $progress->save();

            // Return the response with updated reflection and progress
            ResponseService::successResponse(
                'Reflection recorded. Progress updated.',
                ['reflection' => $reflection, 'progress' => $progress]
            );
        } catch (\Exception $e) {
            ResponseService::errorResponse('Something went wrong while saving the reflection.', null, 500, $e);
        }
    }


    // private function sendLevelChangeNotification($user, $newLevel)
    // {
    //     $message = $newLevel > $user->progress->level ?
    //         'Congratulations, you have leveled up!' : 'Your level has been downgraded due to recent setbacks.';

    //     // You can add more logic for notification title and content based on the level change.
    //     NotificationService::sendFcmNotification(
    //         [$user->device_token], // Send to the user
    //         'Level Change Notification',
    //         $message,
    //         [
    //             'user_id' => $user->id,
    //             'related_id' => $newLevel,
    //             'related_type' => 'Level',
    //             'type' => 'level_change'
    //         ]
    //     );
    // }

    private function sendLevelChangeNotification($user, $newLevel)
    {
        $isLevelUp = $newLevel > $user->progress->level;
        $message = $isLevelUp
            ? 'Congratulations, you have leveled up!'
            : 'Your level has been downgraded due to recent setbacks.';

        NotificationService::sendFcmNotification(
            [$user->device_token], // Send to the user
            'Level Change Notification',
            $message,
            [
                'user_id' => $user->id,                  // Receiver of the notification
                'sender_id' => null,                     // System message; no sender
                'related_id' => $newLevel,               // The new level number
                'related_type' => 'Level',
                'type' => 'level_change'
            ]
        );
    }
}
