<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\{Verification};
use App\Models\{Question, User};
use Illuminate\Http\Request;
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
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
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

        return response()->json([
            'success' => true,
            'otp' => $otp,
            'message' => 'Registration successful. OTP has been sent to your email.',
        ], 201);
    }

    public function resendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:filter',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email address not found.',
            ], 404);
        }

        // Generate new OTP and save it
        $otp = mt_rand(1000, 9999);
        $user->otp = $otp;
        $user->save();

        // Send OTP via email
        $this->sendMail('OTP | Email Verification',  $user->email, "Your verification OTP is: $otp");

        return response()->json([
            'success' => true,
            'message' => 'OTP has been sent to your email.',
        ], 200);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|numeric|digits:4',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->where('otp', $request->otp)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP or email.',
            ], 400);
        }

        // Update user as verified
        $user->email_verified_at = now();
        $user->otp_status = 1; // Allow login
        $user->otp = null; // Clear OTP
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Email verification successful. You can now log in.',
        ], 200);
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|min:4|max:4',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 409);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email address.'
            ], 404);
        }

        if ($user->otp != $request->otp) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP.'
            ], 409);
        }

        // Update password and clear OTP
        $user->password = Hash::make($request->password);
        $user->otp = null;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password has been changed successfully.',
        ], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'device_token' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials.',
            ], 401);
        }

        // Ensure OTP is verified
        if ($user->otp_status == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Please verify your email before logging in.',
            ], 403);
        }

        // Update device token if provided
        if (!empty($request->device_token)) {
            $user->update(['device_token' => $request->device_token]);
        }

        $token = $user->createToken('ApiToken')->plainTextToken;
        // 'data' => $user->only(['id', 'name', 'email', 'otp_status', 'device_token']),
        return response()->json([
            'success' => true,
            'message' => 'Login successful.',
            'data' => $user,
            'token' => $token,
        ], 200);
    }

    public function googleLogin(Request $request)
    {
        $user = Socialite::driver('google')->stateless()->userFromToken($request->token);

        return $this->socialLogin($user, 'google');
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


    public function  allQuestions()
    {
        $questions = Question::with('answers')->get();
        return response()->json([
            'success' => true,
            'message' => 'Questionnaire Show Successfully.',
            'data' => $questions,
        ], 200);
    }
}
