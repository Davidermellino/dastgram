<x-layout>

    <div class="container">
        <div class="row my-5 mx-auto">
            @guest
                <div class="col-6 mx-auto">
                    <div class="row col-12">
                        <h1 class="text-center">
                            ISCRIVITI
                        </h1>
                    </div>
                    <form action="{{ route('register') }}" method="post" class="d-flex flex-column">
                        @csrf
                        <label for="">email</label>
                        <input type="email" name="email" class="my-3">
                        <label for="">nome</label>
                        <input type="text" name="name" class="my-3">
                        <label for="">password</label>
                        <input type="password" name="password" class="my-3">
                        <label for="">conferma password</label>
                        <input type="password" name="password_confirmation" class="my-3">
                        <button type="submit">Iscriviti</button>
                    </form>
                    <div class="row col-12">
                        <p class="text-center">
                            hai gia un account? <a href="{{ route('home') }}">login</a>
                        </p>
                    </div>
                </div>
            @endguest
            @auth
                <div class="col-12 d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
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
</x-layout>
