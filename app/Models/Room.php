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
    
    public function roomOffers()
    {
        return $this->belongsToMany(RoomOffer::class);
    }
    
}
