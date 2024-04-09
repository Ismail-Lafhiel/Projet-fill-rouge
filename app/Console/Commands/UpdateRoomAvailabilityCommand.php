<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;

class UpdateRoomAvailabilityCommand extends Command
{
    protected $signature = 'rooms:update-availability';
    protected $description = 'Update room availability based on booking end dates';

    public function handle()
    {
        $now = Carbon::now();

        // Find bookings where end_date is in the past and status is confirmed, pending, or canceled
        $pastBookings = Booking::where('end_date', '<', $now)
            ->whereIn('status', ['confirmed', 'pending', 'canceled'])
            ->get();

        foreach ($pastBookings as $booking) {
            $room = $booking->room;
            $room->update(['availability' => 'available']);
        }

        // Find bookings where end_date is in the future and status is confirmed
        $futureBookings = Booking::where('end_date', '>', $now)
            ->where('status', 'confirmed')
            ->get();

        foreach ($futureBookings as $booking) {
            $room = $booking->room;
            $room->update(['availability' => 'not available']);
        }

        $this->info('Room availability updated successfully.');
    }
}
