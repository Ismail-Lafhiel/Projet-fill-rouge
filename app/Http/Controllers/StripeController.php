<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Stripe\Checkout\Session as StripeSession;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        // Retrieve checkout ID from the session
        $checkoutId = $request->session()->get('checkout_id');

        // Check if checkout ID is valid
        if (!$checkoutId) {
            return "Invalid checkout ID.";
        }

        // Retrieve the checkout from the database
        $checkout = Checkout::find($checkoutId);

        // Check if checkout exists
        if (!$checkout) {
            return "Checkout not found.";
        }

        // Set Stripe API key
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // Create a new Stripe session
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $this->getLineItems($checkout),
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }


    private function getLineItems($checkout)
    {
        $lineItems = [];

        // Get all bookings associated with the checkout
        foreach ($checkout->bookings as $booking) {
            // Add each booking as a line item
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'USD',
                    'unit_amount' => $booking->total_price * 100, // Stripe requires amount in cents
                    'product_data' => [
                        'name' => 'Room Reservation',
                    ],
                ],
                'quantity' => 1,
            ];
        }

        return $lineItems;
    }

    public function success(Request $request)
    {
        // Retrieve checkout ID from the session
        $checkoutId = $request->session()->get('checkout_id');
        $checkout = Checkout::find($checkoutId);

        // Update the status of each booking to 'confirmed'
        foreach ($checkout->bookings as $booking) {
            $booking->status = 'confirmed';
            $booking->save();
        }

        return "Thanks for your order. Your payment has been successfully processed.";
    }
}
