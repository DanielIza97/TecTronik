@extends('layouts.app')

<body id="bodyimage">
@section('content')
    <div >
    <img src="{{ asset('images/fondo.png') }}" id="img3" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 m">
                <div class="card-header1">{{ __('Iniciar Sesión') }}</div>

                <div class="card-body1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
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
                                <button type="submit" class="btn1 btn-primary">
                                    {{ __('Iniciar sesión') }}
                                </button>
                            </div>
                            </div>
                    </div>
            
            </div>
        </div>
    </div>
</div>
@endsection

</body>