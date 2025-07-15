<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AffirmationController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Route;
use Google\Client;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/test-google-client', function () {
    $client = new Client();
    return 'Google Client is working.';
});



Route::get('/', function () {
    return view('auth/signin');
})->name('login');


Route::post('auth-login', [AdminController::class, 'authenticate'])->name('auth-login');
Route::get('logout', [AdminController::class, 'logout'])->name('logout');


// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    // Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

    // Users Routes 
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/user-detail/{id}', [AdminController::class, 'userDetail'])->name('user-detail');
    Route::get('/user-status/{id}', [AdminController::class, 'toggleUserStatus']);

    // Affirmatives Routes 
    Route::get('/affirmatives', [AffirmationController::class, 'index'])->name('affirmations');
    Route::post('/add-affirm', [AffirmationController::class, 'storeAffirm'])->name('affirmations.store');
    Route::post('/affirm-update/{id}', [AffirmationController::class, 'update'])->name('affirmations.update');
    Route::get('/affirm-delete/{id}', [AffirmationController::class, 'affirmDelete']);

    // Questionnaire Routes 
    Route::get('/questions', [QuestionnaireController::class, 'index'])->name('questions');
    Route::post('/store-questions', [QuestionnaireController::class, 'store'])->name('store-questions');
    Route::put('/questions/{id}', [QuestionnaireController::class, 'update'])->name('update-question');
    Route::delete('/questions/{id}', [QuestionnaireController::class, 'destroy'])->name('delete-question');

    // Lessons Routes 
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons');
    Route::post('/store-lessons', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('/lesson-delete/{id}', [LessonController::class, 'lessonDelete'])->name('lessons.delete');
    Route::put('/lesson-update/{id}', [LessonController::class, 'lessonUpdate'])->name('lessons.update');


    // Community Routes 
    Route::get('/posts', [CommunityController::class, 'getAllPosts'])->name('posts');
    Route::get('/reported-posts', [CommunityController::class, 'getReportedPosts'])->name('reports');
    Route::get('/report-status/{id}/{action}', [CommunityController::class, 'toggleReportStatus']);
});
