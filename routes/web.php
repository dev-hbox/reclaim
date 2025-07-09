<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AffirmationController;
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
});


Route::post('auth-login', [AdminController::class, 'authenticate'])->name('auth-login');


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
    Route::get('/affirmatives', [AffirmationController::class, 'index']);
    Route::get('/affirm-delete/{id}', [AffirmationController::class, 'affirmDelete']);

    // Questionnaire Routes 
    Route::get('/questions', [QuestionnaireController::class, 'index'])->name('questions');
    Route::get('/add-questions', [QuestionnaireController::class, 'addQuestion'])->name('add-questions');
    Route::post('/store-questions', [QuestionnaireController::class, 'store'])->name('store-questions');
    Route::get('/questions/{id}', [QuestionnaireController::class, 'show']);
    Route::put('/questions/{id}', [QuestionnaireController::class, 'update']);
    Route::delete('/questions/{id}', [QuestionnaireController::class, 'destroy']);
});
