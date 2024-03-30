<?php

namespace App\Repositories\Interfaces;

use App\Models\Hotel;
interface HotelRepositoryInterface
{
    public function getAll();
    public function create(array $data);

    public function update(Hotel $hotel, array $data);

    public function delete(Hotel $hotel);
}
