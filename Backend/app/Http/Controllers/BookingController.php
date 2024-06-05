<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingModel; 

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request-> validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'phone_number' => 'required',
            'county' => 'required|string|max:255',
            'date' => 'required|date',
            'facility' => 'required|string|max:255',
        ]);

        // Create booking record
        $bookings = BookingModel::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'county' => $request->county,
            'date' => $request->date,
            'facility' => $request->facility,
        ]);

        // Handle successful booking
        return response()->json([
            'message' => 'Booking submitted successfully!',
            'bookings' => $bookings, 
        ]);
    }
}
