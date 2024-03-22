<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::orderBy("created_at", "desc")->paginate(10);
        $locations = Location::all();
        return view("hotels.index", compact('hotels', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRequest $request)
    {
        $hotel = new Hotel([
            'name' => $request->name,
            'location_id' => $request->location_id,
            'description' => $request->description,
            'rating' => $request->rating,
        ]);

        $hotel->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('hotel_photos', 'public');

                $hotel->photos()->create(['path' => $path]);
            }
        }

        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return view("hotels.show", compact("hotel"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        $locations = Location::all();
        return view("hotels.edit", compact("hotel", "locations"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelRequest $request, Hotel $hotel)
    {
        $hotel->update($request->validated());

        return redirect()->route('hotels.index')->with('success', "{$hotel->name} updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        session()->flash('success', "{$hotel->name} deleted successfully");
        return response()->json(['success' => true, 'message' => "{$hotel->name} deleted successfully"]);
    }
}
