<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function read($id = null)
{
    $apartments = [];
    if ($id != null) {
        $apartment = Apartment::find($id);
        $apartments[] = $apartment;
        $bookings = $apartment->bookings()->get();

        return view('admin.read', compact('apartments', 'bookings'));

    } else {
        $apartments = Apartment::all();

        $bookings = [];

        foreach ($apartments as $apartment) {
            $bookings[$apartment->id] = $apartment->bookings()->get();
        }

        return view('admin.read', compact('apartments', 'bookings'));
    }
}

    
}
