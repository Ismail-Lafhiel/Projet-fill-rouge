<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MainContentController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

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


Route::get("/", [MainContentController::class, 'index'])->name("home");
Route::get("/destinations", [MainContentController::class, 'destinations'])->name("destinations");
Route::get("/hotels-all", [MainContentController::class, 'hotels'])->name("hotels.view");
Route::get("/hotel/{hotel}", [MainContentController::class, 'hotel'])->name("hotel.view");
Route::get("/rooms-all", [MainContentController::class, 'rooms'])->name("rooms.view");
Route::get("/room/{room}", [MainContentController::class, 'room'])->name("room.view");



Route::middleware([
    'auth',
    'admin'
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
    })->name("admin.dashboard");
});


Route::get('/{location}/hotels', [LocationController::class, 'showHotelsInLocation'])->name('hotels.location');
