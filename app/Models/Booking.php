<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date', 'end_date', 'user_id', 'room_id', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    protected static function boot()
{
    parent::boot();

    // Log to check if the boot method is called
    Log::debug('Booking model boot method called.');

    static::saved(function ($booking) {
        if ($booking->status === 'confirmed') {
            $booking->room->updateAvailability();
        }
    });
}

}
