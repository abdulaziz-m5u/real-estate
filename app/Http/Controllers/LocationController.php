<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\Location;

class LocationController extends Controller
{
    public function index($slug){
        $location = Location::where('slug', $slug)->firstOrFail();
        
        $venues = Venue::with('event_types')
        ->where('location_id', $location->id)
        ->latest()
        ->paginate(9);

        return view('location', compact('location', 'venues'));        
    }
}
