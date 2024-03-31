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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'city' => 'required|max:255',
            'country' => 'required|max:255',
        ]);

        $location = Location::create($validatedData);

        return redirect()->route('locations.index')
            ->with('success', "{$location->city} created successfully.");
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }
    public function update(Request $request, Location $location)
    {
        $validatedData = $request->validate([
            'city' => 'required|max:255',
            'country' => 'required|max:255',
        ]);

        $location->update($validatedData);

        return redirect()->route('locations.index')
            ->with('success', "{$location->city} updated successfully.");
    }

    public function destroy(Location $location)
    {
        $location->delete();
        session()->flash('success', "{$location->city} deleted successfully");
        return response()->json(['success' => true, 'message' => "{$location->city} deleted successfully"]);
    }
}
