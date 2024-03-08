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
            background-color :#3467a1;
        }
    </style>
</head>

<body>


    <div class="container-fluid">
        <aside id="mym"  class="col-md-2 text-light p-4 aside">
            <ul class="list-unstyled">
                <li><h5>dashboard</h5></li>
                <li><a href="{{ route('categories.index') }}">CATEGORIES</a></li>
                <li><a href="#">ACCEPTATION</a></li>
                <li><a href="#">USERS</a></li>
                <li><a href="#">STATISTIQUES</a></li>
            </ul>
        </aside>
    </div>

</body>
</html>
@endsection