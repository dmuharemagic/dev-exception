<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar is-spaced customized-navigation is-vcentered" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/') }}">
                <strong>Dev</strong>Exception
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item navbar-item-custom {{ request()->is('/') ? 'is-active' : '' }}" href="{{ route('sort.default') }}">
                    Home
                </a>

                <a class="navbar-item navbar-item-custom {{ request()->is('random') ? 'is-active' : '' }}" href="{{ route('random') }}">
                    Random
                </a>

                <a class="navbar-item navbar-item-custom {{ request()->is('user/*') ? 'is-active' : '' }}" href="{{ route('user.list') }}">
                    Users
                </a>

                <a class="navbar-item navbar-item-custom {{ request()->is('references') ? 'is-active' : '' }}" href="{{ route('references') }}">
                    References
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                <div class="dropdown">
    <div class="dropdown-trigger">
        <input id="search" class="input is-shadowless is-rounded" type="text" placeholder="Search posts...">

        
    </div>
    <div class="dropdown-menu" id="search-menu"></div>
</div>
                </div>
                <div class="navbar-item">
                    @guest
                    <div class="buttons">
                        <a class="button is-primary is-inverted" href="{{ route('register') }}">
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-light" href="{{ route('login') }}">
                            Log in
                        </a>
                    </div>
                    @else
                    <div class="dropdown is-hoverable">
                        <div class="dropdown-trigger">
                            <button class="button is-primary is-inverted" aria-haspopup="true" aria-controls="dropdown-menu">
                                <span class="icon is-small">
                                    <i class="far fa-user-circle"></i>
                                </span>
                                <strong>{{ Auth::user()->name }}</strong>
                            </button>
                        </div>
                        <div class="dropdown-menu" id="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="{{ action('ProfileController@show', Auth::user()->id) }}" class="dropdown-item">
                                    My profile
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Log out
                                </a>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    @yield('hero-title')
                </h1>
                <h2 class="subtitle">
                    @yield('hero-subtitle')
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <a href="#" id="return-top"><i class="fas fa-level-up-alt"></i></a>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>DevException</strong> by <a href="#">Codebusters Team</a>.
            </p>
        </div>
    </footer>
</body>

</html>