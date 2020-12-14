<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo.png')}}" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.5.1.js') }}" defer></script>
    <script src="{{ asset('js/toastr.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('../css/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

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
                </div>
            </div>
        </header>
        <main class="">
            @yield('content')
        </main>
        <footer class="card-footer">
            <div class="footer-content">
                <h1>
                    Ranti-Ranti
                </h1>
                <div class="footer-section contact icon">
                    <h4>Contactanos con:</h4>
                    <div>
                        <p>Teléfono:</p>
                        <div><i class="fa fa-phone" aria-hidden="true"></i>  Telf oficinas: 4751158</div>
                        <p>Tambien puedes escribirnos por nuestro correo electronico</p>
                        <div> <i class="fa fa-envelope-o" aria-hidden="true"></i> productosdecalid_rantiranti@gmail.com</div>
                    </div>
                </div>
                <div class="footer-section  links">
                    <h4>Puedes encontrarnos en:</h4>
                    <div>
                        <div class="icon">
                            <a href="https://www.facebook.com"><i class="fa fa-facebook " aria-hidden="true"></i>ranti-ranti_ec</a><br />
                            <a href="https://www.instagram.com/?hl=es-la"><i class="fa fa-instagram " aria-hidden="true"></i>@ranti-ranti_ec</a><br />
                            <a href="https://twitter.com/home"><i class="fa fa-twitter " aria-hidden="true"></i>#ranti-ranti_ec</a><br />
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
    <script>src="{{mix('js/app.js')}}"  </script>
</body>
</html>