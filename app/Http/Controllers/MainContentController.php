<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Http\Request;

class MainContentController extends Controller
{
    public function index(){
        $locations = Location::orderBy("created_at", "desc")->paginate(6);
        return view("home", compact("locations"));
    }

    public function destinations(){
        $locations = Location::orderBy("created_at", "desc")->paginate(10);

        return view("destinations", compact('locations'));
    }

    public function hotels(){
        $hotels = Hotel::with('photos')->orderBy("created_at", "desc")->paginate(10);
        return view("hotels", compact("hotels"));
    }
    public function rooms(){
        $rooms = Room::with('photos')->orderBy("created_at", "desc")->paginate(10);
        return view("rooms", compact("rooms"));
    }
    
}
