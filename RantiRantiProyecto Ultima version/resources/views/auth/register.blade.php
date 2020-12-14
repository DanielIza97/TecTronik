@extends('layouts.app')
@section('content')
<div class="container m1 pb-5 fondo">
    <div class="row pb-5 justify-content-start">
        <div class="mt-4 card2 offset-md-2">
            <div class="card-header1">{{ __('Crear Cuenta') }}</div>

            <div class="card-body1">
                <label ><pre>(*)Campos obligatorios</pre></label>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="idcedulacliente" class="col-md-12 col-form-label">{{ __('Cedula') }} <span>*</span> </label>
                        <div class="col-md-12">
                            <input id="idcedulacliente" type="text" class="form-control @error('idcedulacliente') is-invalid @enderror" name="idcedulacliente" value="{{ old('idcedulacliente') }}" required autocomplete="idcedulacliente" autofocus>
                            @error('idcedulacliente')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-12 col-form-label">{{ __('Nombre') }} <span>*</span> </label>
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido" class="col-md-12 col-form-label">{{ __('Apellido') }} <span>*</span> </label>
                        <div class="col-md-12">
                            <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

                            @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-12 col-form-label">{{ __('Correo Electrónico') }} <span>*</span> </label>
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>        
                    <div class="form-group row justify-content-center">
                        <label  for="fotouser" class="col-md-12 col-form-label">{{ __('Fotografia') }} <span>*</span> </label>  
                        <div class="col-md-12">
                            <input id="fotouser" type="file" class="@error('fotouser') is-invalid @enderror" name="fotouser" value="{{ old('fotouser') }}" accept="image/*">
                            @error('fotouser')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>                          
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="generocliente" class="col-md-12 col-form-label">{{ __('Sexo ') }} <span>*</span> </label>
                        <div>
                            <input type="radio" id="male" name="generocliente" value="Hombre">
                            <label for="Hombre">Hombre</label>&nbsp; &nbsp;
                            <input type="radio" id="female" name="generocliente" value="Mujer">
                            <label for="Mujer">Mujer</label><br>
                            @error('generocliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-12 col-form-label">{{ __('Contraseña') }} <span>*</span> </label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirmar Contraseña') }} <span>*</span> </label>
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <button type="submit" class="btn1 btn-primary">
                            {{ __('Crear Cuenta') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
