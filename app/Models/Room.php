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
        $isAvailable = false; // Initially assume room is not available

        foreach ($confirmedBookings as $booking) {
            // Check if the current date is between the booking start and end dates
            if ($now->between($booking->start_date, $booking->end_date)) {
                $isAvailable = false; // Room is booked
                break;
            }
        }

        // Log before updating availability
        Log::debug("Updating room availability. Room ID: {$this->id}, Availability: " . ($isAvailable ? 'available' : 'not available'));

        // Update the room availability based on the calculated availability
        $this->update(['availability' => $isAvailable ? 'available' : 'not available']);

        // Log after updating availability
        Log::debug("Room availability updated. Room ID: {$this->id}, Availability: " . ($isAvailable ? 'available' : 'not available'));
    }
}
