<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
  
    public function getAll($id = null)
    {
        if ($id != null) {
            $apartment = Apartment::find($id);
            $apartments[] = $apartment;
            $bookings[$apartment->id] = $apartment->bookings()->get();
    
            // return view('admin.read', compact('apartments', 'bookings'));
    
        } else {
            $apartments = Apartment::all();
    
            $bookings = [];
    
            foreach ($apartments as $apartment) {
                $bookings[$apartment->id] = $apartment->bookings()->get();
            }
    
            // return view('admin.read', compact('apartments', 'bookings'));
        }
        return $bookings;

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Define validation rules for booking fields here
            // For example:
            // 'check_in' => 'required|date',
            // 'check_out' => 'required|date|after:check_in',
            // 'price' => 'required|numeric',
            // 'booked' => 'required|boolean',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->check_in = $request->input('check_in');
        $booking->check_out = $request->input('check_out');
        $booking->price = $request->input('price');
        $booking->booked = $request->input('booked');
        $booking->save();

        return $booking;
        // return redirect()->route('bookings.index')->with('success', 'Booking updated successfully');
    }
}
