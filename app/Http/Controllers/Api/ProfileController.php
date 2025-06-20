<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ResponseService;
use App\Models\Answer;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserAnswer;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function user()
    {
        $user = Auth::user();

        ResponseService::successResponse(
            'Profile retrieved successfully.',
            $user
        );
    }

    public function createProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'age' => 'required|numeric',
            'gender' => 'required|in:male,female,other',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.answer_id' => 'required|exists:answers,id',
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        try {
            // Handle avatar
            $avatar = 'uploads/profile/user-default.png';
            if ($request->hasFile('avatar')) {
                $filename = time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('uploads/profile/'), $filename);
                $avatar = 'uploads/profile/' . $filename;
            }

            // Create profile without user_id (will be linked after login)
            $profile = Profile::create([
                'name' => $request->name,
                'age' => $request->age,
                'gender' => $request->gender,
                'avatar' => $avatar,
                'user_id' => null, // Initially null
            ]);

            // Save user answers and calculate score
            $totalScore = 0;
            foreach ($request->answers as $answer) {
                $answerModel = Answer::find($answer['answer_id']);
                if ($answerModel) {
                    $totalScore += $answerModel->points;
                }
            }

            $profile->update(['risk_score' => $totalScore]);

            $message = $this->getRiskLevelMessage($totalScore, $request->name);

            ResponseService::successResponse(
                'Profile created successfully (without user_id).',
                [
                    'risk_score'      => $totalScore,
                    'welcome_message' => $message,
                    'profile'         => $profile,
                ]
            );
        } catch (\Exception $e) {
            ResponseService::errorResponse('Error creating profile.', null, 500, $e);
        }
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'age' => 'required|numeric',
            'gender' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.answer_id' => 'required|exists:answers,id',
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        try {
            $user = Auth::user();
            $profile = Profile::where('user_id', $user->id)->first();

            if (!$profile) {
                ResponseService::errorResponse('Profile not found.', null, 404);
            }

            // Handle avatar upload
            if ($request->hasFile('avatar')) {
                $filename = time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('uploads/profile/'), $filename);
                $profile->avatar = '/uploads/profile/' . $filename;
            }

            // Update basic profile info
            $profile->update([
                'name'   => $request->name,
                'age'    => $request->age,
                'gender' => $request->gender,
            ]);

            // Update user answers and calculate new risk score
            $totalScore = 0;
            foreach ($request->answers as $answer) {
                UserAnswer::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'question_id' => $answer['question_id']
                    ],
                    ['answer_id' => $answer['answer_id']]
                );

                $answerModel = Answer::find($answer['answer_id']);
                if ($answerModel) {
                    $totalScore += $answerModel->points;
                }
            }

            $profile->update(['risk_score' => $totalScore]);

            ResponseService::successResponse(
                'Profile updated successfully.',
                ['profile' => $profile]
            );
        } catch (\Exception $e) {
            ResponseService::errorResponse(
                'An error occurred while updating the profile.',
                null,
                500,
                $e
            );
        }
    }


    public function profile()
    {
        $user = Auth::user();

        $profile = User::with([
            'profile',
            'userAnswers.question',
            'userAnswers.answer'
        ])->find($user->id);

        if (!$profile) {
            ResponseService::errorResponse('User profile not found.', null, 404);
        }

        $message = $this->getRiskLevelMessage(
            $profile->profile->risk_score ?? 0,
            $profile->profile->name ?? ''
        );

        ResponseService::successResponse(
            'Profile data retrieved successfully.',
            [
                'welcome_message' => $message,
                'profile'         => $profile,
            ]
        );
    }

    private function getRiskLevelMessage($score, $name)
    {
        if ($score >= 30) {
            return "Welcome $name to Your Journey. You are not alone. Your struggle is significant, but it doesn’t define you. We’re here to help you reclaim your life, one step at a time. $name, lean into the support available and stay committed to your journey of healing and renewal.";
        } elseif ($score >= 21) {
            return "Welcome $name to Your Journey. Your challenges are real, but your desire for change is stronger. Building new habits and finding the right support will be key. $name, let’s take this journey step by step, with guidance and encouragement along the way.";
        } elseif ($score >= 11) {
            return "Welcome $name to Your Journey. Your commitment to change is evident. You’ve already shown determination by taking the first steps toward recovery. Focus on building consistent habits and strengthening your resilience to overcome setbacks. $name, we’re here to guide and support you through every challenge.";
        } else {
            return "Welcome $name to Your Journey. You’ve already made progress and shown remarkable dedication. We’ll help you keep growing and strengthening your commitment to freedom and renewal. $name, stay consistent, and keep building on the momentum you’ve already created.";
        }
    }

    public function updateTaskCategoryPreference(Request $request)
    {
        $request->validate([
            'task_category' => 'required|in:mental,physical,breathing,habit,random',
            'task_intensity' => 'required|in:light,moderate,deep',
        ]);
        $user = Auth::user();
        $user->profile()->update([
            'task_category' => $request->task_category,
            'task_intensity' => $request->task_intensity,
        ]);
        $data = [
            'task_category' => $user->profile->task_category,
            'task_intensity' => $user->profile->task_intensity,
        ];

        return ResponseService::successResponse(
            'Task category updated successfully.',
            $data
        );
    }
}
