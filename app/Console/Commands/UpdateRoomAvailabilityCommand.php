<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;

class UpdateRoomAvailabilityCommand extends Command
{
    protected $signature = 'rooms:update-availability';

    protected $description = 'Update room availability based on expired bookings';

    public function handle()
    {
        $now = Carbon::now();

        // Find bookings that have ended
        $expiredBookings = Booking::where('end_date', '<=', $now)
            ->where('status', 'confirmed')
            ->get();

        // Update room availability for each expired booking
        foreach ($expiredBookings as $booking) {
            $room = $booking->room;
            $room->update(['availability' => 'available']);
        }

        $this->info('Room availability updated based on expired bookings.');
    }
}
