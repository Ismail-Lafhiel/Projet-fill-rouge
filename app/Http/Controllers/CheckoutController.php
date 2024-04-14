<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Checkout;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Retrieve the booking data from the session
        $bookingData = $request->session()->get('booking_data');

        // Check if the booking data exists
        if (!$bookingData) {
            return redirect()->route('home')->with('error', 'No booking data found.');
        }

        // Pass the booking data to the checkout view
        return view('checkout', compact('bookingData'));
    }

    public function processCheckout(Request $request)
    {
        // Validate checkout data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
        ]);

        // Create a new checkout instance
        $checkout = new Checkout();
        $checkout->fill($validatedData);
        $checkout->save();

        // Retrieve the booking data from the session
        $bookingData = $request->session()->get('booking_data');

        // Loop through each booking data and create a new booking instance
        foreach ($bookingData as $data) {
            $booking = new Booking();
            $booking->start_date = $data['start_date'];
            $booking->end_date = $data['end_date'];
            $booking->number_of_days = $data['number_of_days'];
            $booking->total_price = $data['total_price'];
            $booking->room_id = $data['room_id'];
            $booking->user_id = Auth::id();
            $booking->checkout_id = $checkout->id;
            $booking->status = 'pending';
            $booking->save();
        }

        // Clear the booking data from the session
        $request->session()->forget('booking_data');

        return redirect()->route('session')->with('checkout_id', $checkout->id);
    }
}
