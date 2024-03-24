<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Http\Request;

class MainContentController extends Controller
{
    public function index(){
        $locations = Location::orderBy("created_at", "desc")->take(6)->get();
        $hotels = Hotel::orderBy('rating', 'desc')->take(6)->get();
        return view("home", compact("locations", "hotels"));
    }

    public function destinations(){
        $locations = Location::orderBy("created_at", "desc")->paginate(10);

        return view("destinations", compact('locations'));
    }
    public function showHotelsInDestination($locationName)
    {
        $location = Location::where('city', $locationName)->firstOrFail();

        $hotels = $location->hotels;

        return view('hotels_in_location', compact('hotels', 'location'));
    }

    public function hotels(){
        $hotels = Hotel::with('photos')->orderBy('rating', 'desc')->paginate(10);
        return view("hotels", compact("hotels"));
    }
    public function hotel(Hotel $hotel){
        $rooms = $hotel->rooms()->paginate(10);
        return view("hotel", compact("hotel", "rooms"));
    }
    public function rooms(){
        $rooms = Room::with('photos')->orderBy('rating', 'desc')->paginate(10);
        return view("rooms", compact("rooms"));
    }
    public function room(Room $room){
        return view("room", compact("room"));
    }
}
