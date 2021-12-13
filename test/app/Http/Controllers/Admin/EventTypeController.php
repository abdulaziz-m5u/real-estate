<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventTypeRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class EventTypeController extends Controller
{
    use MediaUploadingTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventTypes = EventType::get();

        return view('admin.event_types.index', compact('eventTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventTypeRequest $request)
    {
        $eventType = EventType::create($request->validated());

        if ($request->input('photo', false)) {
            $eventType->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.event_types.index')->with('message', 'Success!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EventType $eventType)
    {
        return view('admin.event_types.edit', compact('eventType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEventTypeRequest $request,EventType $eventType)
    {
        $eventType->update($request->validated());

        if ($request->input('photo', false)) {
            if (!$eventType->photo || $request->input('photo') !== $eventType->photo->file_name) {
                $eventType->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($eventType->photo) {
            $eventType->photo->delete();
        }

        return redirect()->route('admin.event_types.index')->with('message', 'Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventType $eventType)
    {
        $eventType->delete();

        return redirect()->route('admin.event_types.index')->with('message', 'Success!');
    }

}
