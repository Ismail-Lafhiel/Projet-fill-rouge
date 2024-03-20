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
                'photo_url' => 'https://picsum.photos/200/300',
            ],
            [
                'city' => 'Marrakech',
                'country' => 'Morocco',
                'photo_url' => 'https://picsum.photos/200/300', 
            ],
            [
                'city' => 'Casablanca',
                'country' => 'Morocco',
                'photo_url' => 'https://picsum.photos/200/300',
            ],
            [
                'city' => 'Paris',
                'country' => 'France',
                'photo_url' => 'https://picsum.photos/200/300',
            ],
            [
                'city' => 'NYC',
                'country' => 'USA',
                'photo_url' => 'https://picsum.photos/200/300',
            ],
            [
                'city' => 'London',
                'country' => 'UK',
                'photo_url' => 'https://picsum.photos/200/300',
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
