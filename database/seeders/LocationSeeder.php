<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'city' => 'Rabat',
                'country' => 'Morocco',
                'photo_url' => 'location_photos/4ZU4bkWs0OFLIM4APBbgJfNYW4tb5uHH6YX2veL9.jpg',
            ],
            [
                'city' => 'Marrakech',
                'country' => 'Morocco',
                'photo_url' => 'location_photos/7FheLbqfYqPDIFK2tpy8HGDiKcsydnNyUDN46Co8.jpg', 
            ],
            [
                'city' => 'Casablanca',
                'country' => 'Morocco',
                'photo_url' => 'location_photos/i7Wwt8338Vp1QmKvEYqtRGYZ8pz5twyQdlauOKHh.jpg',
            ],
            [
                'city' => 'Paris',
                'country' => 'France',
                'photo_url' => 'location_photos/v1hbXamadan4ihQ8NP0o0KZWlTzRdPRVNzBCldlB.jpg',
            ],
            [
                'city' => 'NYC',
                'country' => 'USA',
                'photo_url' => 'location_photos/NzikPtw0T9CZAbsmMRy8rMvybPthjoyAgykYmfi7.jpg',
            ],
            [
                'city' => 'London',
                'country' => 'UK',
                'photo_url' => 'location_photos/7FheLbqfYqPDIFK2tpy8HGDiKcsydnNyUDN46Co8.jpg',
            ],
        ];

        foreach ($locations as $locationData) {
            $location = Location::create([
                'city' => $locationData['city'],
                'country' => $locationData['country'],
            ]);

            if (isset($locationData['photo_url'])) {
                $photo = new Photo(['path' => $locationData['photo_url']]);
                $location->photos()->save($photo);
            }
        }
    }
}
