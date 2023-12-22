<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Location;

class TripController extends Controller
{
    public function create()
    {
        $locations = Location::all();
        return view('trips.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'departure' => 'required|exists:locations,id',
            'destination' => 'required|exists:locations,id|different:departure',
        ]);

        Trip::create([
            'date' => $request->input('date'),
            'departure' => $request->input('departure'),
            'destination' => $request->input('destination'),
        ]);

        return redirect('/trips/create')->with('success', 'Trip created successfully!');
    }
}
