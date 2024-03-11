@extends('layouts.UserApp')

@section('content')

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img id="imgd" class="card-img-top" src="{{ asset('storage/' . $event->media) }}" alt="Event Image">
                <div class="card-body">
                    <h1 class="card-title">Title: {{$event->title}}</h1>
                    <h5 class="card-text">Date: {{$event->date}}</h5>
                    <p class="card-text">Category: {{$event->category->name}}</p>
                    <h5 class="card-text">Location: {{$event->lieu}}</h5>
                    <h5 class="card-text">Available Tickets:</h5>
                    @foreach ($event->tickets as $ticket)
                        @if ($ticket->nbrPlace === 0)
                            <p class="ticket-nbr sold-out">-{{ $ticket->type }}: <span>{{ $ticket->nbrPlace }}</span></p>
                        @else
                            <p class="ticket-nbr available">-{{ $ticket->type }}: <span>{{ $ticket->nbrPlace }}</span></p>
                        @endif
                    @endforeach
                    <p class="card-text">Description: {{$event->description}}</p>
                    <a href="{{ route('myevents') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Event Status</h2>
                    <p class="card-text">Here you can see all pending tickets</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Ticket</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->user->name }}</td>
                                    <td>{{ $reservation->ticket->type }}</td>
                                    <td>{{ $reservation->status }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('acceptTicket', ['reservation' => $reservation]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Accept</button>
                                        </form>
                                        <form method="POST" action="{{ route('refuseTicket', ['reservation' => $reservation]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Refuse</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
