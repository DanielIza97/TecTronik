@extends('layouts.app')

<body id="bodyimage">
@section('content')
    <div >
    <img src="{{ asset('images/fondo.png') }}" id="img3" >
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
                        
                        <div id="doscolumnas">
                        <br><br><br><br><br><br><br><br>
                        <img src="{{ asset('images/logo.png') }}" id="img2">
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <div id="borderlogin">
                                <div class="card-header1" style="text-align:center">{{ __('Iniciar Sesión') }}</div>

                                <div class="card-body1">
                                <form method="POST" action="{{ route('login') }}" class="form-group">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                                        <div class="col-md-6">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="Ingrese correo electrónico" placeholder="Ingrese correo electrónico">
                                            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                        <div class="col-md-5">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"placeholder="Ingrese tu Contraseña">
                                            <small id="emailHelp" class="form-text text-muted">Por seguridad se recomienda crear contraseñas que contengan caracteres en mayúsculas y minúsculas, números y símbolos</small>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Recordar información') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                {{ __('Iniciar sesión') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                    </div>
            
            </div>
        </div>
    </div>
</div>
@endsection

</body>
