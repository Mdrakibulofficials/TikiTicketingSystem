<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\SeatAllocation;

class TicketController extends Controller
{
    public function index()
    {
        $trips = Trip::all();

        return view('tickets.index', compact('trips'));
    }

    public function purchase(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'seat_number' => 'required|integer|min:1|max:36',
        ]);

        $trip = Trip::findOrFail($request->input('trip_id'));
        $seatNumber = $request->input('seat_number');

        if (SeatAllocation::where(['trip_id' => $trip->id, 'seat_number' => $seatNumber])->exists()) {
            return redirect('/tickets')->with('error', 'Seat already taken. Please choose another seat.');
        }

        
        $user = auth()->user();

        SeatAllocation::create([
            'trip_id' => $trip->id,
            'user_id' => $user->id,
            'seat_number' => $seatNumber,
        ]);

        return redirect('/tickets')->with('success', 'Ticket purchased successfully!');
    }
}
