<?php
namespace App\Repositories;

use App\Models\Hotel;
use App\Repositories\Interfaces\HotelRepositoryInterface;

class HotelRepository implements HotelRepositoryInterface
{
    public function getAll()
    {
        return Hotel::orderBy('created_at', 'desc')->paginate(10);
    }
    public function create(array $data)
    {
        return Hotel::create($data);
    }

    public function update(Hotel $hotel, array $data)
    {
        $hotel->update($data);
        return $hotel;
    }

    public function delete(Hotel $hotel)
    {
        $hotel->delete();
    }
}