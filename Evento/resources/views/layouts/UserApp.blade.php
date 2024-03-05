<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YouEvent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <style>
        .input-group-append {
            cursor: pointer;
        }
    </style>
</head>
<body>

<header class="navbar navbar-expand-lg navbar-white bg-white shadow sticky-top">
    <div class="container">
        <a class="navbar-brand" href="" style="color: #2b0f71;"><span style="color: #7b080c;" class="nav-brand-two">You</span>Event</a>
        <div class="navbar-nav">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    My Account
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                           style="color: #000000; text-decoration: none;  padding: .375rem .75rem; font-size: 1rem;
                                 line-height: 1.5; ">Add Event</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Add Events</h5>
        <a type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></a>
    </div>
    <div class="offcanvas-body">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">title</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="title">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">description</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="description">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Lieu</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>choisir une ville</option>
                <option value="1">Tanger</option>
                <option value="2">Rabat</option>
                <option value="3">Essaouira</option>
                <option value="3">Marrakech</option>
                <option value="3">Casablanca</option>
                <option value="3">Oujda</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Date</label>
            <input id="datepicker" width="276"/>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Choisir une image</label>
            <input type="file" class="form-control" aria-label="file example" required>
            <div class="invalid-feedback">Example invalid form file feedback</div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit" disabled>Add event</button>
        </div>
    </div>
</div>

@yield('content')

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5'
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>
