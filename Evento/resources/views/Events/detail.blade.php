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

    .event-info {
        flex: 1;
        margin-right: 20px;
    }

    #imgd {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .back {
        margin-top: 20px;
    }

    .ticket {
        background-color: #0e0e0e;
        color: #fff;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .ticket .date {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .ticket .artist {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .ticket .location {
        font-size: 1.2rem;
    }

    .cta .buy {
        display: inline-block;
        background-color: #ff5733;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .cta .buy:hover {
        background-color: #e63e0b;
    }

</style>

<div class="event-details">
    <div class="event-info">
        <h1>{{ $event->title }}</h1>
        <img id="imgd" src="{{ asset('storage/' . $event->media) }}" alt="Event Image">
        <h5>Date: {{ $event->date }}</h5>
        <h6>Lieu: {{ $event->lieu }}</h6>
        <h4>Description: {{ $event->description }}</h4>
        <h4>Category: {{ $event->category->name }}</h4>
        <a href="{{ route('events.index') }}" class="btn btn-info back">Back to Events</a>
    </div>

    <div class="ticket">
        <div class="date">{{ \Carbon\Carbon::parse($event->date)->isoFormat('dddd, MMMM Do YYYY, h:mm A') }}</div>
        <div class="artist">{{ $event->title }}</div>
        <div class="location">{{ $event->lieu }}</div>
        <div class="cta">
            <a href="#" class="buy">Grab a Ticket</a>
        </div>
    </div>
</div>

@endsection
