<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        {{-- <a class="navbar-brand" href="#">Your Logo</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">

                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('profile') }}">
                            {{ __('Profile') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            Log in
                        </a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link"> Register
                            </a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link" href="{{ route('posts.create') }}">Add Post</a>
                </li>



                <!-- resources/views/layouts/app.blade.php or wherever your navbar is -->


                <!-- Add more menu items as needed -->
            </ul>
        </div>
    </div>
</nav>
