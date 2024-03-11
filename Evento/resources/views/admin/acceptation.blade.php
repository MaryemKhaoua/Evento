@extends('layouts.UserApp')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    header {
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .container-fluid {
        display: flex;
        height: 95vh;
    }

    .aside {
        width: 200px;
        background-color: #343a40;
        color: white;
        padding: 20px;
    }

    .content {
        flex: 1;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
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

    #mym {
        background-color: #3467a1;
    }

#acc {
    text-align: center;
    color: #3467a1;
}

</style>
</head>




    <div class="container-fluid">
        <aside id="mym" class="aside">
            <ul class="list-unstyled">
                <li><h5>dashboard</h5></li>
                <li><a href="{{ route('categories.index') }}">CATEGORIES</a></li>
                <li><a href="{{ route('acceptaion.event') }}">ACCEPTATION</a></li>
                <li><a href="#">USERS</a></li>
                <li><a href="{{ route('admin.statistics') }}">STATISTIQUES</a></li>
            </ul>
        </aside>
        <div class="col-md-10">
            <h1 id="acc">List des événement à accepter</h1>
            <div class="content p-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td class="txt-oflo">{{ $event->title }}</td>
                                    <td class="txt-oflo">{{ $event->description}}</td>
                                    <td class="txt-oflo">{{ $event->date }}</td>
                                    <td class="txt-oflo">{{ $event->lieu }}</td>
                                    <td class="txt-oflo">{{ $event->category->name }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('event.accept',$event->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success"> Accepter</button>
                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
