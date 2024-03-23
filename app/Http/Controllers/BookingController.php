<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function getAll($id = null)
    {
        if ($id != null) {
            $apartment = Apartment::find($id);
            $bookings[$apartment->id] = $apartment->bookings()->orderBy('check_in')->get();

            // return view('admin.read', compact('apartments', 'bookings'));

        } else {
            $apartments = Apartment::all();
            $bookings = [];

            foreach ($apartments as $apartment) {
                $bookings[$apartment->id] = $apartment->bookings()->orderBy('check_in')->get();
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


    public function create(Request $request)
    {
        $booking = new Booking();
        $booking->apartment_id = $request->input('apartment_id');
        $booking->check_in = $request->input('check_in');
        $booking->check_out = $request->input('check_out');
        $booking->price = $request->input('price');
        $booking->booked = $request->input('booked');

        return $booking->save();
    }

    public function delete(Request $request)
    {
        $bookingId = $request->input('booking_id');
    
        $booking = Booking::find($bookingId);
    
        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }
    
        try {
            $booking->delete();
            return response()->json(['message' => 'Booking deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete booking'], 500);
        }
    }
    


    public function automaticWeeks(Request $request)
    {
        // Determinar la ID del apartamento
        $apartmentId = $request->input('apartment_id');

        if ($apartmentId == 1) {
            // Para el apartamento 1, el rango va del primer sábado de junio al último sábado de septiembre
            $startDate = Carbon::createFromDate(null, 6, 1)->startOfWeek(Carbon::SATURDAY);
            if ($startDate->month != 6) {
                $startDate->addWeek();
            }
            $endDate = Carbon::createFromDate(null, 9, 30)->endOfWeek(Carbon::SATURDAY);
            if ($endDate->month != 9) {
                $endDate->subWeek();
            }
        } elseif ($apartmentId == 2) {
            // Para el apartamento 2, el rango va del primer domingo de junio al último domingo de septiembre
            $startDate = Carbon::createFromDate(null, 6, 1)->startOfWeek(Carbon::SUNDAY);
            if ($startDate->month != 6) {
                $startDate->addWeek();
            }
            $endDate = Carbon::createFromDate(null, 9, 30)->endOfWeek(Carbon::SUNDAY);
            if ($endDate->month != 9) {
                $endDate->subWeek();
            }
        } else {
            return response()->json(['error' => 'Invalid apartment ID'], 400);
        }

        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            // Crear reserva para el apartamento con la ID dada
            $booking = new Booking();
            $booking->apartment_id = $apartmentId; // ID del apartamento
            $booking->check_in = $currentDate->toDateString();
            $booking->check_out = $currentDate->copy()->addWeek()->toDateString(); // Agregar 7 días para una semana completa
            $booking->price = rand(100, 200); // Precio aleatorio entre 100 y 200
            $booking->booked = rand(0, 1); // Estado de reserva aleatorio: 1 para reservado, 0 para no reservado
            $booking->save();

            // Mover a la próxima semana
            $currentDate->addWeek();
        }

        return response()->json(['message' => 'Bookings created successfully'], 200);
    }
}
