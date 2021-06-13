<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Forum</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-dark">
    @yield('error')
    <div id="app" class="bg-dark">
        <div class="sticky-top" style="opacity: 0.9">
        <nav class="navbar navbar-expand-md navbar-light bg-secondary shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/home') }}">
                    Forum
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
                                </li>
                            @endif
                        @else
                        <!--Wyszukiwarka-->
                            <div class="row mr-5">
                                <div id="custom-search-input">
                                    <div class="input-group col-md-12">
                                        <form action="{{ url('home/search') }}" method="post" id="search"> 
                                            @csrf
                                            <input name="query" type="text" class="search-query form-control bg-light" placeholder="Wyszukaj..." />
                                        </form>
                                        <span class="input-group-btn">
                                            <button class="btn btn-dark" type="submit" form="search">
                                                Wyszukaj
                                            </button>
                                        </span>               
                                    </div>
                                </div>
                            </div>
                            <li class="nav-item dropdown text-white">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('konto') }}">
                                        Konto
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ url('posty') }}">
                                       Posty
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (Auth::check())

        <nav class="navbar navbar-expand-md navbar-light bg-secondary shadow-sm border-top border-light" style="height: 4vh">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav m-auto text-uppercase">
                            <li class="nav-item dropdown text-white">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Fotografia
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('posty/kategoria/fotografia') }}">
                                        Posty
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ url('posty/statystyki/fotografia') }}">
                                       Statystyki
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown text-white ml-5">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Film
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('posty/kategoria/film') }}">
                                        Posty
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ url('posty/statystyki/film') }}">
                                        Statystyki
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown text-white ml-5">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Muzyka
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('posty/kategoria/muzyka') }}">
                                        Posty
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ url('posty/statystyki/muzyka') }}">
                                        Statystyki
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown text-white ml-5">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Informatyka
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('posty/kategoria/informatyka') }}">
                                        Posty
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ url('posty/statystyki/informatyka') }}">
                                       Statystyki
                                    </a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>   
    </div>
        @endif

        <main class="py-5">
            @yield('user_panel')
        </main>
    </div>
    <footer class="blockquote-footer">Bartosz Poszelężny ©</footer>
</body>
</html>
