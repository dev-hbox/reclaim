<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $progress = UserProgress::where('user_id', $user->id)->first();

        if (!$progress) {
            return response()->json(['success' => false, 'message' => 'Progress not found.'], 404);
        }

        $rankName = $this->getRankName($progress->level);

        return response()->json([
            'success' => true,
            'message' => "Progress data Show Successfully!",
            'data' => [
                'points' => $progress->points,
                'level' => $progress->level,
                'rank' => $rankName,
                'streak_days' => $progress->streak_days,
                'missed_checkins' => $progress->missed_checkins,
            ]
        ]);
    }

    private function getRankName($level)
    {
        return match ($level) {
            1 => 'The Seeker',
            2 => 'The Climber',
            3 => 'The Watchful One',
            4 => 'The Resilient Soul',
            5 => 'The Faithful Pilgrim',
            6 => 'The Mountain Watcher',
            7 => 'Guardian of the Summit',
            default => 'Unranked',
        };
    }
}
