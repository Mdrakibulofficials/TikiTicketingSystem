
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Trips</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <ul>
            @foreach($trips as $trip)
                <li>
                    <div class="trip-info">
                        <p>Trip on {{ $trip->date }} from {{ $trip->departureLocation->name }} to {{ $trip->destinationLocation->name }}</p>
                        <form action="/tickets/purchase" method="post">
                            @csrf
                            <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                            <label for="seat_number">Choose a seat (1-36):</label>
                            <input type="number" name="seat_number" min="1" max="36" required>
                            <button type="submit" class="btn btn-success">Purchase Ticket</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
