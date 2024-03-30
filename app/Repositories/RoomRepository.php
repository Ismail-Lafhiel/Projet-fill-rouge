<?php

namespace App\Repositories;

use App\Models\Room;
use App\Repositories\Interfaces\RoomRepositoryInterface;
class RoomRepository implements RoomRepositoryInterface
{
    public function getAll()
    {
        return Room::orderBy('created_at', 'desc')->paginate(10);
    }

    public function create(array $data)
    {
        return Room::create($data);
    }

    public function update(Room $room, array $data)
    {
        return $room->update($data);
    }

    public function delete(Room $room)
    {
        return $room->delete();
    }
}