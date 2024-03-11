@extends('layouts.UserApp')

@section('content')

<style>
.event-details {
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
}

.event-info-card {
    flex: 1;
    margin-right: 20px;
}

.ticket-card {
    flex: 1;
}

.card {
    border: 1px solid #dee2e6;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.card h1, .card h5, .card h6, .card h4, .card p {
    margin-bottom: 10px;
}

.card img {
    width: 100%;
    border-radius: 10px;
}

.card-btn {
    margin-top: 20px;
}
</style>

<div class="event-details">
    <div class="event-info-card card">
        <h1>{{ $event->title }}</h1>
        <img id="imgd" src="{{ asset('storage/' . $event->media) }}" alt="Event Image">
        <h5>Date: {{ $event->date }}</h5>
        <h6>Lieu: {{ $event->lieu }}</h6>
        <h4>Description: {{ $event->description }}</h4>
        <h4>Category: {{ $event->category->name }}</h4>
        <a href="{{ route('events.index') }}" class="btn btn-info back">Back to Events</a>
    </div>

    <div class="ticket-card card">
        <h5>Available Tickets:</h5>
        @foreach ($event->tickets as $ticket)
            @if ($ticket->nbrPlace === 0)
                <h6 style="text-decoration: line-through">-{{ $ticket->type }}: <span style="color:red;">{{ $ticket->nbrPlace }}</span></h6>
            @else
                <h6>-{{ $ticket->type }}: <span style="color:green;">{{ $ticket->nbrPlace }}</span></h6>
            @endif
        @endforeach
        @if ($tTickets != 0)
            <button type="button" class="btn btn-success card-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Reserve</button>
        @else
            <button class="btn btn-danger card-btn" disabled>Sold Out</button>
        @endif
        {{-- <a href="/" class="btn btn-primary card-btn">Back</a> --}}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose Your Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('createReservation') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <div class="modal-body">
                        <label for="form4Example3" class="form-label">Type:</label>
                        <select id="type" name="type" class="form-control">
                            @foreach ($event->tickets as $ticket)
                                @if ($ticket->nbrPlace != 0)
                                    <option value="{{ $ticket->id }}">{{ $ticket->type }} - {{ $ticket->price }}DH</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Reserve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
