<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location_id',
        'number_of_rooms',
        'description',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
