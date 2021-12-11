@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Event
    </div>

    <div class="card-body">
        <form action="{{ route('admin.event_types.update', $eventType) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($eventType) ? $eventType->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="slug">Slug*</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($eventType) ? $eventType->slug : '') }}" required>
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </em>
                @endif
            </div>
            <div>
                <button class="btn btn-danger" type="submit" >Save</button>
            </div>
        </form>
    </div>
</div>
@endsection