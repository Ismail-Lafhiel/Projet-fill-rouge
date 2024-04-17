<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainContentController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy("created_at", "desc")->take(6)->get();
        $locationsInMorocco = Location::where("country", "like",  "%Morocco%")->take(6)->get();
        $hotels = Hotel::orderBy('rating', 'desc')->take(6)->get();
        $rooms = Room::orderBy('rating', 'desc')->take(6)->get();
        return view("home", compact("locations", "hotels" ,"locationsInMorocco", 'rooms'));
    }

    public function destinations()
    {
        $locations = Location::orderBy("created_at", "desc")->paginate(10);

        return view("destinations", compact('locations'));
    }
    public function showHotelsInDestination($locationName)
    {
        $location = Location::where('city', $locationName)->firstOrFail();

        $hotels = $location->hotels;

        return view('hotels_in_location', compact('hotels', 'location'));
    }

    public function hotels()
    {
        $hotels = Hotel::with('photos')->orderBy('rating', 'desc')->paginate(10);
        return view("hotels", compact("hotels"));
    }
    public function hotel(Hotel $hotel)
    {
        $rooms = $hotel->rooms()->paginate(10);
        return view("hotel", compact("hotel", "rooms"));
    }
    public function rooms()
    {
        $rooms = Room::with('photos')->orderBy('rating', 'desc')->paginate(10);
        return view("rooms", compact("rooms"));
    }
    public function room(Room $room)
    {
        return view("room", compact("room"));
    }
    public function getUserInformation()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $userId = $user->id;
            $userName = $user->name;
            $userEmail = $user->email;

            return view('profile', compact('user'));
        } else {
            return redirect()->route('login');
        }
    }

    public function user_bookings(User $user)
    {
        $bookings = $user->bookings()->paginate(10);
        return view('user_bookings', compact('user', 'bookings'));
    }
    public function cancelBooking(Booking $booking)
    {
        $booking->update(['status' => 'canceled']);

        session()->flash('success', "Your booking cancelled successfully");
        return response()->json(['success' => true, 'message' => "Your booking cancelled successfully"]);
    }
}
