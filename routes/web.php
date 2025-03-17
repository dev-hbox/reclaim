<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Questionnaire;
use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('index');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    // Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Questionnaire Routes 
    Route::get('/questions', [QuestionnaireController::class, 'index'])->name('questions');
    Route::get('/add-questions', [QuestionnaireController::class, 'addQuestion'])->name('add-questions');
    Route::post('/store-questions', [QuestionnaireController::class, 'store'])->name('store-questions');
    Route::get('/questions/{id}', [QuestionnaireController::class, 'show']);
    Route::put('/questions/{id}', [QuestionnaireController::class, 'update']);
    Route::delete('/questions/{id}', [QuestionnaireController::class, 'destroy']);
});
