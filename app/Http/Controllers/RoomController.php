<?php

namespace App\Http\Controllers;

use App\Events\BookingCreated;
use App\Http\Requests\RoomRequest;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomOffer;
use App\Models\RoomType;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use App\Rules\StartDateNotBeforeToday;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class RoomController extends Controller
{
    protected $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function index()
    {
        $rooms = $this->roomRepository->getAll();
        $hotels = Hotel::all();
        $room_types = RoomType::all();
        $room_offers = RoomOffer::all();
        $room = Room::all();
        // $bookings = $room->bookings()->where('room_id', 'id')->get();
        return view("rooms.index", compact("rooms", "hotels", "room_types", "room_offers"));
    }

    public function store(RoomRequest $request)
    {
        $data = $request->validated();

        // Create the room
        $room = $this->roomRepository->create($data);

        // Attach room offers
        if ($request->has('room_offers')) {
            $room->roomOffers()->attach($request->room_offers);
        }

        // Handle image upload
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('room_photos', 'public');
                $room->photos()->create(['path' => $path]);
            }
        }

        // Update number of rooms for the hotel
        $hotel = Hotel::findOrFail($request->hotel_id);
        $hotel->number_of_rooms = $hotel->rooms()->count();
        $hotel->save();

        return redirect()->back()->with('success', 'Room created successfully.');
    }



    public function show(Room $room)
    {
        return view("rooms.show", compact("room"));
    }

    public function edit(Room $room)
    {
        $hotels = Hotel::all();
        $room_types = RoomType::all();
        $room_offers = RoomOffer::all();
        return view("rooms.edit", compact("room", "hotels", "room_types", "room_offers"));
    }

    public function update(RoomRequest $request, Room $room)
    {
        $data = $request->validated();
        $this->roomRepository->update($room, $data);

        // Handle image upload
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('room_photos', 'public');
                $room->photos()->create(['path' => $path]);
            }
        }

        return redirect()->route('rooms.index')->with('success', "{$room->reference} updated successfully");
    }


    public function destroy(Room $room)
    {

        $hotel = $room->hotel;
        $this->roomRepository->delete($room);
        $hotel->number_of_rooms = $hotel->rooms()->count();
        $hotel->save();
        session()->flash('success', "{$room->reference} deleted successfully");
        return response()->json(['success' => true, 'message' => "{$room->reference} deleted successfully"]);
    }

    public function bookRoom(Request $request, Room $room)
    {
        if ($room->availability !== 'available') {
            return redirect()->back()->with('error', 'The room is not available for booking.');
        }

        $validatedData = $request->validate([
            'start_date' => ['required', 'date', new StartDateNotBeforeToday],
            'end_date' => 'required|date|after:start_date',
        ], [
            'start_date.before' => 'The start date must be today or later.',
        ]);

        $startDate = Carbon::parse($validatedData['start_date']);
        $endDate = Carbon::parse($validatedData['end_date']);

        $numberOfDays = $endDate->diffInDays($startDate);
        $roomPrice = $room->price;
        $totalPrice = $numberOfDays * $roomPrice;

        // Fetch the Room model object
        $room = Room::findOrFail($room->id);

        $bookingData = [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'number_of_days' => $numberOfDays,
            'total_price' => $totalPrice,
            'room_id' => $room->id,
            'room' => $room, // Include the 'room' key with the Room model object
        ];

        // Retrieve existing booking data from the session
        $existingBookingData = $request->session()->get('booking_data', []);

        // Add the new booking data to the existing array
        $existingBookingData[] = $bookingData;

        // Store the updated booking data in the session
        $request->session()->put('booking_data', $existingBookingData);

        return redirect()->route('checkout');
    }
    // update availability command
    // php artisan rooms:update-availability
}
