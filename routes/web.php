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

Route::get('/login', [AuthController::class,'showLogin']);
Route::get('/register', [AuthController::class,'showRegister']);
Route::post('/login-to-account', [AuthController::class,'login'])->name('login');
Route::post('/create-account', [AuthController::class,'register'])->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot_password');
});
Route::get('/reset-password', function () {
    return view('auth.reset_password');
});
