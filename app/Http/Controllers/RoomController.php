<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use App\Repositories\Interfaces\RoomRepositoryInterface;
use App\Rules\StartDateNotBeforeToday;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        return view("rooms.index", compact("rooms", "hotels", "room_types"));
    }

    public function store(RoomRequest $request)
    {
        $data = $request->validated();
        $room = $this->roomRepository->create($data);

        // Handle image upload
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('room_photos', 'public');
                $room->photos()->create(['path' => $path]);
            }
        }

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
        return view("rooms.edit", compact("room", "hotels", "room_types"));
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

        $booking = new Booking();
        $booking->user_id = auth()->user()->id;
        $booking->room_id = $room->id;
        $booking->start_date = $startDate;
        $booking->end_date = $endDate;
        $booking->number_of_days = $numberOfDays;
        $booking->total_price = $totalPrice;
        $booking->status = 'pending';
        $booking->save();

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
