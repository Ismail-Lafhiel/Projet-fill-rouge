<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable=[
        'reference',
        'availability',
        'number_of_beds',
        'description',
        'price',
        'room_type',
        'hotel_id'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
