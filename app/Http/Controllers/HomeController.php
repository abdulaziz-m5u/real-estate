<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\Location;
use App\Models\EventType;

class HomeController extends Controller
{
    public function index()
    {
        $featuredVenues = Venue::where('is_featured', 1)->get();

        $eventTypes = EventType::all();
        $locations = Location::all();

        $newestVenues = Venue::with('event_types')->latest()->take(3)->get();

        return view('home', compact('featuredVenues', 'eventTypes', 'locations', 'newestVenues'));
    }
}
