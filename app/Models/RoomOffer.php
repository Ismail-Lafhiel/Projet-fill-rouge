<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'wifi',
        'bathtub',
        'tv',
        'meals',
        'cleaning',
        'parking',
        'beach_view',
    ];

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
