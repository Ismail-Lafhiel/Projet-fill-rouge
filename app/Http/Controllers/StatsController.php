<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Booking;

class StatsController extends Controller
{
    public function index()
    {
        // User statistics
        $totalUsers = User::count();
        $usersWithBookings = User::has('bookings')->count();

        // Hotel statistics
        $totalHotels = Hotel::count();
        $roomsPerHotel = Hotel::withCount('rooms')->get();

        // Room statistics
        $totalRooms = Room::count();
        $bookingsPerRoom = Room::withCount('bookings')->get();
        $mostBookedRooms = Room::withCount('bookings')->orderByDesc('bookings_count')->limit(5)->get();

        // Total number of bookings
        $totalBookings = Booking::count();

        return view('admin.index', [
            'total_users' => $totalUsers,
            'users_with_bookings' => $usersWithBookings,
            'total_hotels' => $totalHotels,
            'rooms_per_hotel' => $roomsPerHotel,
            'total_rooms' => $totalRooms,
            'bookings_per_room' => $bookingsPerRoom,
            'most_booked_rooms' => $mostBookedRooms,
            'total_bookings' => $totalBookings,
        ]);
    }
}
