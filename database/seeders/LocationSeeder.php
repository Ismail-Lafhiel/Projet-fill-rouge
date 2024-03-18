<?php

namespace Database\Seeders;

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
            ['city' => 'Rabat', 'country' => 'Morocco'],
            ['city' => 'Marrakech', 'country' => 'Morocco'],
            ['city' => 'Casablanca', 'country' => 'Morocco'],
            ['city' => 'Paris', 'country' => 'France'],
            ['city' => 'London', 'country' => 'United Kingdom'],
        ];

        foreach ($locations as $location) {
            DB::table('locations')->insert($location);
        }
    }
}
