<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
       <div class="row">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('main.index')}}">Main</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('contacts.index')}}">Contacts</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('about.index')}}">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('post.index')}}" tabindex="-1" aria-disabled="true">Post</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
       </div>
    </div>
    @yield('content')
</body>
</html>