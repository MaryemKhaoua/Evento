@extends('layouts.UserApp')

@section('content')

<style>

    .back {
        margin-top: 20px;
    }

    .event-info {
        flex: 1;
        margin-right: 20px;
    }

    .ticket-card {
        flex: 1;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-top: 20px;
    }
</style>

    <div class="ticket-card">
        <h3>Add Tickets</h3>
        <form action="{{ route('ticket.store') }}" method="post">
            @csrf
            <label for="type">Ticket Type:</label>
            <select name="type" id="type">
                <option value="standard">Standard</option>
                <option value="vip">VIP</option>
            </select><br><br>
            <label for="nbrPlace">Number of Tickets:</label>
            <input type="number" name="nbrPlace" id="nbrPlace" min="0" value="0"><br><br>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" min="0" value="0"><br><br>
            <input type="hidden" name="event_id" value="{{ $id }}">
            <button type="submit" class="btn btn-success">Add Tickets</button>
        </form>
    </div>
</div>

@endsection
