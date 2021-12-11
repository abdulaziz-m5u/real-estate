@extends('layouts.admin')

@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.venues.create') }}">
                Add Venue
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Venue
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Location">
                <thead>
                    <tr>
                        <th width="10">
                            #
                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Slug
                        </th>
                        <th>
                            Location
                        </th>
                        <th>
                            Event Type
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Latitude
                        </th>
                        <th>
                            Longitude
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Features
                        </th>
                        <th>
                            People Minimun
                        </th>
                        <th>
                            People Maximum
                        </th>
                        <th>
                            Price Per Hour
                        </th>
                        <th>
                            Photo
                        </th>
                        <th>
                            Gallery
                        </th>
                        <th>
                            Is Featured
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($venues as $key => $venue)
                    <tr data-entry-id="{{ $venue->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $venue->id ?? '' }}
                        </td>
                        <td>
                            {{ $venue->name ?? '' }}
                        </td>
                        <td>
                            {{ $venue->slug ?? '' }}
                        </td>
                        <td>
                            {{ $venue->location->name ?? '' }}
                        </td>
                        <td>
                            @foreach($venue->event_types as $key => $item)
                                <span class="badge badge-info">{{ $item->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            {{ $venue->address ?? '' }}
                        </td>
                        <td>
                            {{ $venue->latitude ?? '' }}
                        </td>
                        <td>
                            {{ $venue->longitude ?? '' }}
                        </td>
                        <td>
                            {{ $venue->description ?? '' }}
                        </td>
                        <td>
                            {{ $venue->features ?? '' }}
                        </td>
                        <td>
                            {{ $venue->people_minimum ?? '' }}
                        </td>
                        <td>
                            {{ $venue->people_maximum ?? '' }}
                        </td>
                        <td>
                            {{ $venue->price_per_hour ?? '' }}
                        </td>
                        <td>
                            @if($venue->main_photo)
                                <a href="{{ $venue->main_photo->getUrl() }}" target="_blank">
                                    <img src="{{ $venue->main_photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                        <td>
                            @if($venue->gallery)
                                @foreach($venue->gallery as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            {{ $venue->is_featured ? 'Yes' : 'No' }}
                        </td>
                        <td>
                            <a class="btn btn-xs btn-info" href="{{ route('admin.venues.edit', $venue->id) }}">
                                Edit
                            </a>
                            <form action="{{ route('admin.venues.destroy', $venue->id) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-xs btn-danger" >Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection