<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/register', [AuthController::class, 'register']);
Route::post('/resend-otp', [AuthController::class, 'resendOTP']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

Route::post('auth/google', [AuthController::class, 'googleLogin']);
Route::post('auth/apple', [AuthController::class, 'appleLogin']);


Route::get('/all-questions', [AuthController::class, 'allQuestions']);


Route::group(['middleware' => ['auth:sanctum']], function () {


    // User Profile Routes
    Route::get('/user', [profileController::class, 'user']);
    Route::post('/create-profile', [ProfileController::class, 'createProfile']);
    Route::post('/edit-profile', [profileController::class, 'editProfile']);
    Route::get('/profile', [profileController::class, 'profile']);
    Route::get('/all-users', [AuthController::class, 'allUsers']);
    Route::get('/single-user', [AuthController::class, 'singleUser']);
});
