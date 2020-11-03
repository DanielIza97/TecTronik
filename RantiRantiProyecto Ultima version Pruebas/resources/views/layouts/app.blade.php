<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header >
            <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logo.png" width="50px">
                        {{ config('app.name', 'Laravel') }}
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
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Crear Cuenta') }}</a>
                                    </li>
                                @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/imagesusers/{{ Auth::user()->fotouser}}" width="50px" class="image">
                                    {{ Auth::user()->name}}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @if (Auth::user()->rol=='cliente')
                                        <a class="dropdown-item" href="/clienteinformacion/{{Auth::user()->name}}">
                                            {{ __('Información') }}
                                        </a>
                                    @endif
                                </div>
                                
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                
            </div>
            <nav class="navbar navbar-expand-md navbar-light bg-white1 shadow-sm">
                @yield('menu')
            </nav>
        </header>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="navbar-toggler-icon">
            
            <div>
                <h5>Contactos</h5>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0987451235 Henry Chiluiza</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0965471248 Daniel Iza</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0974124369 Xavier Jaya</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0991234723 Ian Masache</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i>+593-0997465832 Andres Salazar</div>
                <div><i class="fa fa-phone" aria-hidden="true"></i> +593-0997456891 Atik Yumbay</div>
                <div> <i class="fa fa-envelope-o" aria-hidden="true"></i> grupo6@infomental.com</div>
            </div>
        </footer>
    </div>
</body>
</html>
