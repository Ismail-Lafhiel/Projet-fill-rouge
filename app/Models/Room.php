<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'availability',
        'number_of_beds',
        'description',
        'price',
        'hotel_id',
        'rating',
        'room_type_id'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function updateAvailability()
    {
        // Get all confirmed bookings for the room
        $confirmedBookings = $this->bookings()->where('status', 'confirmed')->get();
        $now = now();
        $isAvailable = true;

        // Log the current time for debugging
        // Log::debug("Current time: {$now}");

        foreach ($confirmedBookings as $booking) {
            // Log the booking details for debugging
            Log::debug("Booking ID: {$booking->id}, Start Date: {$booking->start_date}, End Date: {$booking->end_date}");

            // Check if the current date is between the booking start and end dates
            if ($now->between($booking->start_date, $booking->end_date)) {
                $isAvailable = false;
                break;
            }
        }

        // Log before updating availability
        // Log::debug("Updating room availability. Room ID: {$this->id}, Availability: " . ($isAvailable ? 'available' : 'not available'));

        // Update the room availability based on the calculated availability
        $this->update(['availability' => $isAvailable ? 'available' : 'not available']);

        // Log after updating availability
        // Log::debug("Room availability updated. Room ID: {$this->id}, Availability: " . ($isAvailable ? 'available' : 'not available'));
    }
}
