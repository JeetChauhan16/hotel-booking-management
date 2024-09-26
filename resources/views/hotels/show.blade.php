@extends('admin.layouts.admin-header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success" id="flash_message">
                {{ session('message') }}
            </div>
            @endif
    <h1>{{ $hotel->name }}</h1>
    <p>{{ $hotel->description }}</p>
    <p>Location: {{ $hotel->location }}</p>

    <h2>Rooms</h2>
        <ul>
            @foreach($hotel->rooms as $room)
                <li>
                    Room {{ $room->room_number }} - ${{ $room->price }}
                    @if($room->is_available)
                        <form method="POST" action="{{ route('bookings.store') }}">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <label for="check_in">Check-in:</label>
                            <input type="date" name="check_in" required>
                            <label for="check_out">Check-out:</label>
                            <input type="date" name="check_out" required>
                            <button type="submit">Book</button>
                        </form>
                    @else
                        Not Available
                    @endif
                </li>
            @endforeach
        </ul>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    window.onload = function() {
        var flashMessage = document.getElementById('flash_message');
        
        if (flashMessage) {
            setTimeout(function() {
                flashMessage.classList.add('fade-out');
                setTimeout(function() {
                    flashMessage.style.display = 'none';
                }, 1000);  // Wait for fade-out to complete before hiding
            }, 2000);  // Show message for 2 seconds
        }
    };
</script>

@endsection
