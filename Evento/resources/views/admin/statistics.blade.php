@extends('layouts.UserApp')

@section('content')
<style>

    .card-container {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .card {
        flex-basis: 45%;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(8, 94, 222, 0.1);
    }

    .card-title {
        font-size: 1.2em;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .card-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-number {
        font-size: 2em;
        font-weight: bold;
    }

    .user-card {
        background-color: #5e72e4;
        color: white;
    }

    .event-card {
        background-color: #f5365c;
        color: white;
    }


    .aside {
        width: 200px;
        background-color: #3467a1;
        color: white;
        padding: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        height: 100vh;
        overflow-y: auto;
    }

    aside li a {
            text-decoration: none;
            color: white;
        }

        aside li {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: .3s;
        }

        aside li:hover {
            background-color: rgb(3, 67, 120);
        }

        aside li:hover a {
            color: #39030d;
        }
        #st {
            text-align: center;
            color: #5e72e4;
            font-size: 4em;
        }
</style>

<div class="container-fluid">
    <div class="row">
        <aside class="col-md-2 p-4 aside">
            <ul class="list-unstyled">
                <li><h5>Dashboard</h5></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li><a href="{{ route('acceptaion.event') }}">Acceptation</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="{{ route('admin.statistics') }}">Statistics</a></li>
            </ul>
        </aside>

        <div class="col-md-10">
            <h1 id="st">STATISTICS</h1>
            <div class="card-container">
                <div class="card user-card">
                    <div class="card-title">Users</div>
                    <div class="card-content">
                        <div>Total Users</div>
                        <div class="card-number">{{ $userCount }}</div>
                    </div>
                </div>
                <div class="card event-card">
                    <div class="card-title">Events</div>
                    <div class="card-content">
                        <div>Total Events</div>
                        <div class="card-number">{{ $eventCount }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection