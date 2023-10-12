<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <script src="https://kit.fontawesome.com/f571261d1b.js" crossorigin="anonymous"></script>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @auth
        <div class="container my-5">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('home')}}">Home</a></li>
                                <li><a class="dropdown-item" href="{{ route('create.post') }}">Crea post</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger">LOGOUT</button>
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
    {{ $slot }}
    @livewireScripts
</body>

</html>
