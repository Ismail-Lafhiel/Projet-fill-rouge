<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MainContentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomOfferController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\StripeController;
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
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/login-to-account', [AuthController::class, 'login'])->name('account.login');
    Route::post('/create-account', [AuthController::class, 'register'])->name('account.register');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgotPassword');
    Route::post('/send-reset-link-email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password', function () {
        return view('auth.reset_password');
    })->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('password.change');
    // profile
    Route::get('/profile', [MainContentController::class, 'getUserInformation'])->name("user.profile");
    // bookmarks
    // hotel bookmarks
    Route::post('/hotels/{hotel}/bookmark', [HotelController::class, 'bookmark'])->name('hotels.bookmark');
    Route::get('/hotels/bookmarks', [HotelController::class, 'bookmarks'])->name('hotels.bookmarks');
    // booking
    Route::post('/book/{room}', [RoomController::class, 'bookRoom'])->name("bookRoom");
    Route::get('{user}/bookings', [MainContentController::class, 'user_bookings'])->name('user.bookings');
    // checkout
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/session', [StripeController::class, 'session'])->name('session');
    Route::get('/success', [StripeController::class, 'success'])->name('success');
});

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
    // roomtype routes
    Route::resource('roomtype', RoomTypeController::class);
    // location routes
    Route::resource('locations', LocationController::class);
    // room_offer routes 
    Route::resource('roomoffers', RoomOfferController::class);
    // admin dashboard
    Route::get('/dashboard', function () {
        return view("admin.index");
    })->name("admin.dashboard");
});

Route::get('/{location}/hotels', [MainContentController::class, 'showHotelsInDestination'])->name('hotels.location');
Route::delete('cancel-booking/{booking}', [MainContentController::class, 'cancelBooking'])->name('cancel.booking');
