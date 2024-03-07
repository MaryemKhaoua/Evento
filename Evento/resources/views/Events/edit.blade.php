@extends('layouts.UserApp')

@section('content')
<div class="container mt-4">
    <h2>Edit Event</h2>
    <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" placeholder="Title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $event->description }}" placeholder="Description">
        </div>
        <div class="mb-3">
            <label for="lieu" class="form-label">Lieu</label>
            <select class="form-select" id="lieu" name="lieu" aria-label="Default select example">
                <option selected>Choose a city</option>
                <option value="Tanger">Tanger</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Essaouira">Essaouira</option>
                    <option value="Marrakech">Marrakech</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Oujda">Oujda</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="text" class="form-control" id="date" name="date" value="{{ $event->date }}" placeholder="MM/DD/YYYY">
        </div>
        <div class="mb-3">
            <label for="media" class="form-label">Choose an image</label>
            <input type="file" class="form-control" id="media" name="media" aria-label="file example">
        </div>
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection
