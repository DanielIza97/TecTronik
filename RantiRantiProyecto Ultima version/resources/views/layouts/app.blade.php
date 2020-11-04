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
    <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
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
        <main class="py-4" style="">
            @yield('content')
        </main>
        <footer class="card-footer">
            <div class="footer-content">
                <div class="footer-section about">
                    <div>
                        <h1>
                            Ranti-Ranti
                        </h1>
                        <p>
                            Página web universitario que trata de ayudar a la comunidad en general
                            a conocer sobre los trastornos mentales causados por la cuarentena a causa del
                            virus Covid-19

                        </p>
                    </div>
                </div>
                <div class="footer-section contact icon">
                    <h4>Contactanos con:</h4>
                    <div>
                        <p>Telefono</p>
                        <div><i class="fa fa-phone" aria-hidden="true"></i>  Telf oficinas: 4751158</div>
                        <p>Correo Electronico</p>
                        <div> <i class="fa fa-envelope-o" aria-hidden="true"></i> productosdecalid_rantiranti@gmail.com</div>
                    </div>
                </div>
                <div class="footer-section  links">
                    <h4>Siguenos en nuestras redes sociales </h4>
                    <div>
                        <div class="icon">
                            <a href="https://www.facebook.com"><i class="fa fa-facebook " aria-hidden="true"></i>infoMentalEc</a><br />
                            <a href="https://www.instagram.com/?hl=es-la"><i class="fa fa-instagram " aria-hidden="true"></i>@infoMentalEc</a><br />
                            <a href="https://twitter.com/home"><i class="fa fa-twitter " aria-hidden="true"></i>infoMentalEc</a><br />
                        </div>
                    </div>
                </div>
            </div>
            <div id="container">
                <hr />
                <small> &#169 2020 Todos los derechos reservados. Diseñado por Grupo 10</small>
            </div>
        </footer>
    </div>
</body>
</html>
