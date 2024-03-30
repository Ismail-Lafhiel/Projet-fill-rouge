<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index(){
        $room_types = RoomType::orderByDesc("id")->paginate(10);
        return view("room_types.index", compact("room_types"));
    }
}
