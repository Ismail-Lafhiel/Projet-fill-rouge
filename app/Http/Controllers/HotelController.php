<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use App\Models\Location;
use App\Repositories\Interfaces\HotelRepositoryInterface;

class HotelController extends Controller
{
    protected $hotelRepository;

    public function __construct(HotelRepositoryInterface $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = $this->hotelRepository->getAll();
        $locations = Location::all();
        return view("hotels.index", compact('hotels', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRequest $request)
    {
        $data = $request->validated();
        $hotel = $this->hotelRepository->create($data);

        // Handle image upload if photos are sent
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('hotel_photos', 'public');
                $hotel->photos()->create(['path' => $path]);
            }
        }

        return redirect()->route('hotels.index')->with('success', "{$hotel->name} created successfully");
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
        $data = $request->validated();

        // Handle image upload if photos are sent
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('hotel_photos', 'public');
                $hotel->photos()->create(['path' => $path]);
            }
        }

        $this->hotelRepository->update($hotel, $data);

        return redirect()->route('hotels.index')->with('success', "{$hotel->name} updated successfully");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $this->hotelRepository->delete($hotel);
        session()->flash('success', "{$hotel->name} deleted successfully");
        return response()->json(['success' => true, 'message' => "{$hotel->name} deleted successfully"]);
    }
}
