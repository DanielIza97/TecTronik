@extends('layouts.app')

@section('content')
<div class="container m1 fondo">
    <div class="offset-md-2 row justify-content-start">
        <div class="card2 mt-5 mb-5 " >
            <div class="card-header1">{{ __('Iniciar Sesión') }}</div>

            <div class="card-body1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" value="{{encrypt($url)}}" name="url">
                    <div class="form-group row">
                        <label for="email" class="col-md-12 col-form-label">{{ __('Correo electrónico') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-12 col-form-label">{{ __('Contraseña') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recordar información') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <button type="submit" class="btn1 btn-primary">
                            {{ __('Iniciar sesión') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
