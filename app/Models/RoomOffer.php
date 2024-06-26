<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
        'image_path'
    ];

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
