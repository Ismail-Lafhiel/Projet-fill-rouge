<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view("locations.index", compact("locations"));
    }

    public function showHotelsInLocation($locationName)
    {
        $location = Location::where('city', $locationName)->firstOrFail();

        $hotels = $location->hotels;

        return view('hotels_in_location', compact('hotels', 'location'));
    }
}
