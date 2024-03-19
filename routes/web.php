<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoomController;
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
Route::get('/login', [AuthController::class, 'showLogin'])->name("login");

Route::get('/register', [AuthController::class, 'showRegister'])->name("register");

Route::post('/login-to-account', [AuthController::class, 'login'])->name('account.login');

Route::post('/create-account', [AuthController::class, 'register'])->name('account.register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name("forgotPassword");

Route::post('/send-reset-link-email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password', function () {
    return view('auth.reset_password');
})->name('password.reset');

Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.change');


Route::get("/home", function(){
    return view("home");
});


Route::middleware([
    'auth'
])->group(function () {
    // locations routes
    Route::resource('locations', LocationController::class);
    // hotel routes
    Route::resource('hotels', HotelController::class);
    // rooms routes
    Route::resource('rooms', RoomController::class);

    // admin dashboard
    Route::get('/dashboard', function () {
        return view("admin.index");
    });
});
