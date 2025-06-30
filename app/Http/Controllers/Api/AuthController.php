<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ResponseService;
use App\Mail\{Verification};
use App\Models\{Commitment, DailyAffirmative, Profile, Question, SaveLesson, User};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{Auth, Hash, Mail, Validator};
use Laravel\Socialite\Facades\Socialite;

require_once app_path('Helpers/helpers.php');

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {

            ResponseService::validationError($validator->errors()->first());
        }

        // Generate a random OTP
        $otp = mt_rand(1000, 9999);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => $otp,
            'otp_status' => 0,
            'device_token' => $request->device_token ?? null
        ]);

        // Send OTP email
        $this->sendMail(
            'OTP Verification',
            $user->email,
            "Your OTP for email verification is: $otp"
        );

        ResponseService::successResponse(
            'Registration successful. OTP has been sent to your email.',
            ['otp' => $otp],
            [],
            201
        );
    }

    public function resendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:filter',
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            ResponseService::errorResponse('Email address not found.', null, 404);
        }

        // Generate new OTP and save it
        $otp = mt_rand(1000, 9999);
        $user->otp = $otp;
        $user->save();

        // Send OTP via email
        $this->sendMail('OTP | Email Verification',  $user->email, "Your verification OTP is: $otp");

        ResponseService::successResponse(
            'OTP has been sent to your email.',
            ['otp' => $otp]
        );
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|numeric|digits:4',
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        $user = User::where('email', $request->email)->where('otp', $request->otp)->first();

        if (!$user) {
            ResponseService::errorResponse('Invalid email or OTP.', null, 404);
        }

        // Update user as verified
        $user->email_verified_at = now();
        $user->otp_status = 1; // Allow login
        $user->otp = null; // Clear OTP
        $user->save();


        ResponseService::successResponse(
            'Email verification successful. You can now log in.',
            [
                'user'  => $user
            ]
        );
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|min:4|max:4',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            ResponseService::errorResponse('Invalid email address.', null, 404);
        }

        if ($user->otp != $request->otp) {
            ResponseService::errorResponse('Invalid OTP.', null, 409);
        }

        // Update password and clear OTP
        $user->password = Hash::make($request->password);
        $user->otp = null;
        $user->save();

        ResponseService::successResponse('Password has been changed successfully.');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'device_token' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            ResponseService::validationError($validator->errors()->first());
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            ResponseService::errorResponse('Invalid credentials.', null, 401);
        }

        // Ensure OTP is verified
        if ($user->otp_status == 0) {
            ResponseService::errorResponse('Please verify your email before logging in.', null, 403);
        }

        // Update device token if provided
        if (!empty($request->device_token)) {
            $user->update(['device_token' => $request->device_token]);
        }

        //  Link anonymous profile if it exists (optional logic - adjust as per your criteria)
        // $unclaimedProfile = Profile::whereNull('user_id')->orderBy('created_at', 'desc')->first();

        $profile = Profile::where('user_id', $user->id)->first();

        // if ($unclaimedProfile) {
        //     $unclaimedProfile->update(['user_id' => $user->id]);
        // }
        $user['profile_name'] = $profile->name ?? '';
        $user['profile_gender'] = $profile->gender ?? '';
        $user['profile_image'] = $profile->avatar ?? '';
        $token = $user->createToken('ApiToken')->plainTextToken;

        ResponseService::successResponse(
            'Login successful.',
            [
                'user'  => $user,
                'token' => $token,
            ]
        );
    }

    public function googleLogin(Request $request)
    {
        try {
            $request->validate([
                'token' => 'required|string',
                'device_token' => 'nullable|string'
            ]);

            $googleUser = Socialite::driver('google')->stateless()->userFromToken($request->token);

            if (!$googleUser->getEmail()) {
                ResponseService::errorResponse('Google account does not have an email.', null, 400);
            }

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'password' => Hash::make(Str::random(16)),
                    'otp_status' => 1,
                    'device_token' => $request->device_token,
                ]
            );

            $token = $user->createToken('ApiToken')->plainTextToken;

            ResponseService::successResponse('Google login successful.', [
                'user'  => $user,
                'token' => $token
            ]);
        } catch (\Exception $e) {
            ResponseService::errorResponse('Google login failed.', null, 500, $e);
        }
    }

    public function appleLogin(Request $request)
    {
        $user = Socialite::driver('apple')->stateless()->userFromToken($request->token);

        return $this->socialLogin($user, 'apple');
    }

    public function sendMail($title, $email, $body)
    {
        $mailData = [
            'title' => $title,
            'email' => 'Email: ' . $email,
            'body' => $body
        ];

        Mail::to($email)->send(new Verification($mailData));
    }

    public function allQuestions()
    {
        $questions = Question::select('id', 'question_text')
            ->with(['answers:id,question_id,answer_text,points'])
            ->get();

        ResponseService::successResponse(
            'Questionnaire Show Successfully.',
            $questions
        );
    }

    public function todayAffirmation()
    {
        $today = now()->toDateString();

        // Try to find today's affirmation
        $affirmation = DailyAffirmative::where('show_date', '<=', $today)
            ->orderByDesc('show_date')
            ->first();

        if (!$affirmation) {
            ResponseService::errorResponse('No affirmation available yet.', null, 404);
        }

        ResponseService::successResponse('Affirmation fetched.', $affirmation);
    }
    public function deleteAccount()
    {
        $user = Auth::user();

        // Delete direct relationships
        $user->profile()?->delete();
        $user->userAnswers()->delete();
        $user->dailyReflections()->delete();
        $user->progress()?->delete();
        $user->panicTasks()->delete();
        $user->posts()->delete();
        $user->comments()->delete();
        $user->likes()->delete();

        // Delete commitments
        Commitment::where('user_id', $user->id)->each(function ($commitment) {
            $commitment->delete();
        });

        // Delete saved lessons
        SaveLesson::where('user_id', $user->id)->each(function ($lesson) {
            $lesson->delete();
        });

        // Finally delete the user
        $user->delete();

        return ResponseService::successResponse('Account and data deleted successfully.');
    }
}
