
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a Trip</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/trips/store" method="post" class="trip-form">
            @csrf
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="departure">Departure:</label>
                <select name="departure" class="form-control" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="destination">Destination:</label>
                <select name="destination" class="form-control" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Trip</button>
        </form>
    </div>
@endsection
