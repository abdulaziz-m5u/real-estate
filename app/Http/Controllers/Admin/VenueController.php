<?php

namespace App\Http\Controllers\Admin;

use App\Models\Venue;
use App\Models\Location;
use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVenueRequest;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::get();

        return view('admin.venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::pluck('name', 'id');
        $eventTypes = EventType::pluck('name', 'id');

        return view('admin.venues.create', compact('locations','eventTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVenueRequest $request)
    {
        $venue = Venue::create($request->validated() + [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude, 
            'features' => $request->features,
            'description' => $request->description,
            'price_per_hour' => $request->price_per_hour,
            'is_featured' => $request->is_featured,
        ]);
        $venue->event_types()->sync($request->event_types);

        return redirect()->route('admin.venues.index')->with('message','Success !');
    }

    /**
     * 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        $locations = Location::all()->pluck('name', 'id');

        $eventTypes = EventType::all()->pluck('name', 'id');

        $venue->load('location', 'event_types');

        return view('admin.venues.edit', compact('venue', 'locations', 'eventTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVenueRequest $request, Venue $venue)
    {
        $venue->update($request->validated() + [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude, 
            'features' => $request->features,
            'description' => $request->description,
            'price_per_hour' => $request->price_per_hour,
            'is_featured' => $request->is_featured,
        ]);
        $venue->event_types()->sync($request->event_types);

        return redirect()->route('admin.venues.index')->with('message','Success !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return back();
    }
}
