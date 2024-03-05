@extends('layouts.UserApp')

@section('content')

<div class="container mt-4">
    <div class="row">
        @foreach ($events as $event )
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($event->media)
                <img src="{{ asset('storage/' . $event->media) }}" alt="Event Media" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text">{{ $event->description }}</p>
                    <p class="card-text"><strong>Date:</strong> {{ $event->date}}</p>
                    <p class="card-text"><strong>Lieu:</strong> {{ $event->lieu }}</p>
                    {{-- <a href="{{ route('event.reserve', $event->id) }}" class="btn btn-primary">Réserver</a> --}}
                    <a href="#" class="btn btn-primary">Réserver</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection