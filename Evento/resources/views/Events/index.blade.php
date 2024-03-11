@extends('layouts.UserApp')

@section('content')

<div class="container mt-4">

    <div class="row">
        @foreach ($events as $event)
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
                    <p class="card-text"><strong>Category:</strong> {{ $event->category->name }}</p>

                    @if(auth()->user()->id == 2)
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-info">Update</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif

                    <a href="{{ route('details', $event->id) }}" class="btn btn-warning">Detail</a>

                </div>
            </div>
        </div>
        @endforeach
        {{ $events->links() }}
    </div>
</div>

<style>
    .card-img-top {
        height: 30em;
        object-fit: cover;
    }
</style>
@endsection
