<?php

namespace Database\Seeders;

use App\Models\RoomOffer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RoomOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $offers = [
            [
                'service' => 'wifi',
                'image_path' => 'room_offers/wifi.svg',
            ],
            [
                'service' => 'bathtub',
                'image_path' => 'room_offers/bathtub.svg',
            ],
            [
                'service' => 'tv',
                'image_path' => 'room_offers/tv.svg',
            ],
            [
                'service' => 'meals',
                'image_path' => 'room_offers/meals.svg',
            ],
            [
                'service' => 'cleaning',
                'image_path' => 'room_offers/cleaning.svg',
            ],
            [
                'service' => 'parking',
                'image_path' => 'room_offers/parking.svg',
            ],
            [
                'service' => 'beach_view',
                'image_path' => 'room_offers/beach_view.svg',
            ],
        ];

        // Insert each offer into the room_offers table
        foreach ($offers as $offer) {
            DB::table('room_offers')->insert([
                'service' => $offer['service'],
                'image_path' => $offer['image_path'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
