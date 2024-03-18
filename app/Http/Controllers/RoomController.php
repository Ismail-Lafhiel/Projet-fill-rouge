<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderBy("created_at", "desc")->paginate(10);
        $hotels = Hotel::all();
        return view("rooms.index", compact("rooms", "hotels"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $room = new Room([
            'reference' => $request->reference,
            'hotel_id' => $request->hotel_id,
            'description' => $request->description,
            'availability' => $request->availability,
            'number_of_beds' => $request->number_of_beds,
            'room_type' => $request->room_type,
            'price' => $request->price,
        ]);

        $room->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('room_photos');
                $room->photos()->create(['path' => $path]);
            }
        }

        return redirect()->back()->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
