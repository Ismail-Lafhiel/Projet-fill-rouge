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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRequest $request)
    {
        $hotel = new Hotel([
            'name' => $request->name,
            'location_id' => $request->location_id,
            'number_of_rooms' => $request->number_of_rooms,
            'description' => $request->description,
        ]);

        $hotel->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('photos', 'public');

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
