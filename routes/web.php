<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name("loginForm");

Route::get('/register', [AuthController::class, 'showRegister'])->name("registerForm");

Route::post('/login-to-account', [AuthController::class, 'login'])->name('login');

Route::post('/create-account', [AuthController::class, 'register'])->name('register');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name("forgotPassword");

Route::post('/send-reset-link-email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password', function () {
    return view('auth.reset_password');
})->name('password.reset');

Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.change');
