<?php
// routes/web.php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Login Page
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.submit');

// Home Page (Library System)
Route::get('/home', [UserController::class, 'showForm'])->name('home')->middleware('auth');
Route::post('/home/action', [UserController::class, 'handleAction'])->name('user.action');