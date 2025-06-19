<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommitmentController;
use App\Http\Controllers\Api\PanicController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProgressController;
use App\Http\Controllers\Api\ReflectionController;
use App\Http\Controllers\Api\SaveLessonController;
use App\Http\Controllers\LessonController;
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
    Route::post('/update-profile', [profileController::class, 'updateProfile']);
    Route::get('/profile', [profileController::class, 'profile']);
    Route::get('/all-users', [AuthController::class, 'allUsers']);
    Route::get('/single-user', [AuthController::class, 'singleUser']);
    Route::post('/tast-category', [ProfileController::class, 'updateTaskCategoryPreference']);

    // google login 
    Route::post('/auth-google', [AuthController::class, 'googleLogin']);

    // Evening Recollect Routes 
    Route::post('/evening-recollect', [ReflectionController::class, 'store']);

    // User Progress Routes 
    Route::get('/my-progress', [ProgressController::class, 'show']);

    // Panic Button Routes
    Route::post('/generate', [PanicController::class, 'startPanicTask']);
    Route::post('/tasks-complete', [PanicController::class, 'completePanicTask']);
    Route::get('/my-tasks', [PanicController::class, 'myTasks']);


    // Commitments Routes 
    Route::get('/my-commitments', [CommitmentController::class, 'myCommits']);
    Route::post('/store-commitments', [CommitmentController::class, 'storeCommit']);
    Route::post('/commitments-update', [CommitmentController::class, 'updateCommit']);
    Route::post('/commitments-delete', [CommitmentController::class, 'deleteCommit']);
    Route::post('/commitments-update-status', [CommitmentController::class, 'updateStatusCommit']);


    // Lesson Routes
    Route::get('/lessons', [LessonController::class, 'allLessons']);
    Route::post('/save-lesson', [SaveLessonController::class, 'saveLesson']);
    Route::get('/save-lesson-list', [SaveLessonController::class, 'saveLessonList']);
});
