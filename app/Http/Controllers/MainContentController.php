<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MainContentController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy("created_at", "desc")->take(6)->get();
        $locationsInMorocco = Location::where("country", "like",  "%Morocco%")->take(6)->get();
        $hotels = Hotel::orderBy('rating', 'desc')->take(6)->get();
        $rooms = Room::orderBy('rating', 'desc')->take(6)->get();
        return view("home", compact("locations", "hotels", "locationsInMorocco", 'rooms'));
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
        $locations = Location::all();
        return view("hotels", compact("hotels", "locations"));
    }
    public function hotel(Hotel $hotel)
    {
        $rooms = $hotel->rooms()->paginate(10);
        return view("hotel", compact("hotel", "rooms"));
    }
    public function rooms()
    {
        $rooms = Room::with('photos')->orderBy('rating', 'desc')->paginate(10);
        $room_types = RoomType::all();
        return view("rooms", compact("rooms", "room_types"));
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
    // search methods
    // destination search
    public function searchDestinations(Request $request)
    {
        $city = $request->input('city');
        $country = $request->input('country');

        $locationsQuery = Location::query();

        if ($city || $country) {
            $locationsQuery->where(function ($query) use ($city, $country) {
                if ($city) {
                    $query->where('city', 'like', '%' . $city . '%');
                }
                if ($country && $country != '#') {
                    $query->where('country', $country);
                }
            });
        }

        $locations = $locationsQuery->with('photos')->orderBy('created_at', 'desc')->get();

        if ($locations->isEmpty()) {
            return response()->json(['message' => 'No results found']);
        }

        return response()->json(['locations' => $locations]);
    }
    // hotels search
    public function searchHotels(Request $request)
    {
        $hotel_name = $request->input('name');
        $location_id = $request->input('location_id');

        $hotelsQuery = Hotel::query();

        if ($hotel_name || $location_id != "#") {
            $hotelsQuery->where(function ($query) use ($hotel_name, $location_id) {
                if ($hotel_name) {
                    $query->where("name", "like", "%" . $hotel_name . "%");
                }
                if ($location_id && $location_id != "#") {
                    $query->where("location_id", $location_id);
                }
            });
        }

        $hotels = $hotelsQuery->with('photos')->orderBy("created_at", 'desc')->get();

        if ($hotels->isEmpty()) {
            return response()->json(['message' => 'No results found']);
        }

        return response()->json(['hotels' => $hotels]);
    }
    public function searchRooms(Request $request)
    {
        $hotel_id = $request->input('hotel_id');
        $room_type_id = $request->input('room_type_id');

        $roomQuery = Room::query();

        if ($hotel_id || $room_type_id) {
            $roomQuery->where(function ($query) use ($hotel_id, $room_type_id) {
                if ($hotel_id) {
                    $query->where('hotel_id', $hotel_id);
                }
                if ($room_type_id && $room_type_id != "#") {
                    $query->where('room_type_id', $room_type_id);
                }
            });
        }

        $rooms = $roomQuery->with(['photos', 'roomType', 'hotel'])->orderBy('created_at', 'desc')->get();

        if ($rooms->isEmpty()) {
            return response()->json(['message' => 'No results found']);
        }

        return response()->json(['rooms' => $rooms]);
    }
}
