<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $room_types = RoomType::orderByDesc("id")->paginate(10);
        return view("room_type.index", compact("room_types"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50'
        ]);

        $roomType = RoomType::create($validatedData);

        return redirect()->route('roomtype.index')->with('success', "$roomType->name room created successfully");
    }

    public function edit($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view("room_type.edit", compact('roomType'));
    }
    public function show($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view("room_type.show", compact('roomType'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50'
        ]);
        $roomType = RoomType::findOrFail($id);
        $roomType->update($validatedData);

        return redirect()->route('roomtype.index')->with('success', "$roomType->name updated successfully");
    }

    public function destroy($id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->delete();

        session()->flash('success', "{$roomType->name} deleted successfully");
        return response()->json(['success' => true, 'message' => "{$roomType->name} deleted successfully"]);
    }
}
