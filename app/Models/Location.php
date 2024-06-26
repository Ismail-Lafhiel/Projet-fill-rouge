<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'country'
    ];

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
