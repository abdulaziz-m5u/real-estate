@extends('layouts.admin')

@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.locations.create') }}">
                Add Location
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Location
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
                            Photo
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $key => $location)
                        <tr data-entry-id="{{ $location->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $location->id ?? '' }}
                            </td>
                            <td>
                                {{ $location->name ?? '' }}
                            </td>
                            <td>
                                {{ $location->slug ?? '' }}
                            </td>
                            <td>
                                @if($location->photo)
                                    <a href="{{ $location->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $location->photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.locations.edit', $location->id) }}">
                                    Edit
                                </a>

                                <form action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" onsubmit="return confirm('Are you sure');" style="display: inline-block;">
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