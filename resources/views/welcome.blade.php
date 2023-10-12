<x-layout>

    <div class="container-fluid">
        <div class="row my-5 mx-auto justify-content-center">
            @guest
                <div class="col-6">
                    <div class="row col-12">
                        <h1 class="text-center">
                            LOGIN
                        </h1>
                    </div>
                    <form action="{{ route('login') }}" method="post" class="d-flex flex-column">
                        @csrf
                        <label for="">email</label>
                        <input type="email" name="email" class="my-3">
                        <label for="">password</label>
                        <input type="password" name="password" class="my-3">
                        <button type="submit">Loggati</button>
                    </form>
                    <div class="row col-12">
                        <p class="text-center">
                            non hai un accout? <a href="{{ route('register') }}">Registrati</a>
                        </p>
                    </div>
                </div>
            @endguest
            @auth
                <h3>
                    Tutti i post
                </h3>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                            @foreach ($posts as $post)
                                <livewire:show-posts :post="$post" />
                            @endforeach
                        </div>
                    </div>
                </div>
            @endauth
        </div>

    </div>

</x-layout>
