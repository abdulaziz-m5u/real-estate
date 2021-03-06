<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    public function index($slug){
        $eventType = EventType::where('slug', $slug)->firstOrFail();

        $venues = Venue::with('event_types')
        ->whereHas('event_types', function($q) use ($slug) {
            $q->where('event_types.slug', $slug);
        })
        ->latest()
        ->paginate(9);
        
        return view('event_type', compact('eventType', 'venues'));
    }
}
