<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ action('App\StaticsController@index') }}">Co-Blog</a>
        @if(Auth::check())
            @if(Auth::user()->getRole->id === 3)
            <div class="nav-item">
                <a href="{{ action('Admin\StaticsController@dashboard') }}" class="btn btn-light">
                    Admin
                </a>
            </div>
            @endif
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ action('App\StaticsController@index') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                @if(Auth::check())
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mon compte
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Modifier mes informations</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ action('App\StaticsController@logout') }}">Logout</a>
                    </div>
                </div>
                @else
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('register') ? 'active' : '' }}" href="{{ route("register") }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('login') ? 'active' : '' }}" href="{{ route("login") }}">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
