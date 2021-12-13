@extends('layouts.admin')

@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.event_types.create') }}">
                Add Event
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Event
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-eventType">
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
                            Photo
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventTypes as $key => $eventType)
                        <tr data-entry-id="{{ $eventType->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $eventType->id ?? '' }}
                            </td>
                            <td>
                                {{ $eventType->name ?? '' }}
                            </td>
                            <td>
                                {{ $eventType->slug ?? '' }}
                            </td>
                            <td>
                                @if($eventType->photo)
                                    <a href="{{ $eventType->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $eventType->photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.event_types.edit', $eventType->id) }}">
                                    Edit
                                </a>

                                <form action="{{ route('admin.event_types.destroy', $eventType->id) }}" method="POST" onsubmit="return confirm('Are you sure');" style="display: inline-block;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
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