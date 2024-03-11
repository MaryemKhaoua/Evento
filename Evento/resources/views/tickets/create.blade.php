@extends('layouts.UserApp')

@section('content')

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="welcome-page">
    <h2 class="welcome-message">Add Tickets</h2>
    <p>You Can Add Tickets To Your Event Here! Thank You.</p>
</div>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('ticket.create', ['id' => $event->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <div class="mb-3">
                                <label for="nbrPlace" class="form-label" min="0">Number of Tickets:</label>
                                <input type="number" id="nbrPlace" name="nbrPlace" class="form-control">
                                @error('nbrPlace')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price: (DH)</label>
                                <input type="number" step="0.01" id="price" name="price" class="form-control">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="border p-5 mb-4">
                                <label class="form-label">Type:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Standard" name="type" id="type_standard">
                                    <label class="form-check-label" for="type_standard">Standard</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="VIP" name="type" id="type_vip">
                                    <label class="form-check-label" for="type_vip">VIP</label>
                                </div>
                                @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button name="submit" type="submit" class="btn btn-info">Add Tickets</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
