@extends('layouts.UserApp')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 20px;
    }

    h1 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button {
        background-color: #ffc107;
        color: #fff;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 5px;
    }

    button:hover {
        background-color: #ff9800;
    }

    .error-message {
        color: #ff0000;
        margin-top: 5px;
    }
</style>
</head>

<body>
    <h1>Add Category</h1>

    @if ($errors->any())
    <div class="error-message">
        <strong>Validation errors:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success" id="alert">
        {{ session('success') }}
    </div>
    @endif

    {{-- @if(session('category'))
    <div class="category">
        <strong>Category added:</strong> {{ session('category')->name }}
    </div>
    @endif --}}

    <form method="POST" action="{{ route('categories.index') }}">
        @csrf
        <div>
            <label for="category">Category Name:</label>
            <input type="text" id="category" name="category" value="{{ old('category') }}">
        </div>

        <button type="submit">Add Category</button>
    </form>

    <h2>All Categories</h2>

    <ul>
        @foreach($categories as $category)
        <li>{{ $category->name }}
            <form  method="POST" >
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-info" >Update</button>
            </form>
            <form method="POST" action="{{ route('categories.destroy', ['category' => $category->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>

</html>

@endsection