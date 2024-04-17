<?php

namespace App\Http\Controllers;

use App\Models\RoomOffer;
use Illuminate\Http\Request;

class RoomOfferController extends Controller
{
    public function index()
    {
        $room_offers = RoomOffer::orderByDesc("id")->paginate(10);
        return view("room_offer.index", compact("room_offers"));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service' => 'required|string|max:255',
            'image_path' => 'required|image|max:2048',
        ]);

        // Handle file upload and storage
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/room_offers', $imageName);
            $validatedData['image_path'] = $imageName;
        }

        // Create RoomOffer instance with the provided data
        $roomOffer = new RoomOffer();
        $roomOffer->service = $validatedData['service'];
        $roomOffer->image_path = $validatedData['image_path'];
        $roomOffer->save();

        return redirect()->route('roomoffers.index')->with('success', "Room offer created successfully");
    }

    public function edit($id)
    {
        $roomOffer = RoomOffer::findOrFail($id);
        return view("room_offer.edit", compact('roomOffer'));
    }

    public function show($id)
    {
        $roomOffer = RoomOffer::findOrFail($id);
        return view("room_offer.show", compact('roomOffer'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'service' => 'required|string|max:255',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $roomOffer = RoomOffer::findOrFail($id);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('room_offers');
            $validatedData['image_path'] = $imagePath;
        }

        $roomOffer->update($validatedData);

        return redirect()->route('roomoffers.index')->with('success', "Room offer updated successfully");
    }


    public function destroy($id)
    {
        $roomOffer = RoomOffer::findOrFail($id);
        $roomOffer->delete();

        session()->flash('success', "Room offer deleted successfully");
        return response()->json(['success' => true, 'message' => "Room offer deleted successfully"]);
    }
}
