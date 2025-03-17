<?php

if (!function_exists('socialLogin')) {
    function socialLogin($socialUser, $provider)
    {
        $user = \App\Models\User::where('email', $socialUser->email)->first();

        if (!$user) {
            $user = \App\Models\User::create([
                'email' => $socialUser->email,
                'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(16)), // Random password
                'otp_status' => 1, // Mark as verified
                'device_token' => null
            ]);
        }

        // Generate API token
        $token = $user->createToken('ApiToken')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => ucfirst($provider) . ' login successful.',
            'data' => $user->only(['id', 'email']),
            'token' => $token
        ], 200);
    }
}
