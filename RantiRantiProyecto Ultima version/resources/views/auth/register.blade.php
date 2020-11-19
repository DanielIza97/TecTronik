@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header1">{{ __('Crear Cuenta') }}</div>

                <div class="card-body1">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="idcedulacliente" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>
                            <div style="color:red">*</div>
                            <div class="col-md-6">
                                <input id="idcedulacliente" type="text" class="form-control @error('idcedulacliente') is-invalid @enderror" name="idcedulacliente" value="{{ old('idcedulacliente') }}" required autocomplete="idcedulacliente" autofocus>
                                @error('idcedulacliente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div style="color:red">*</div>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                            <div style="color:red">*</div>
                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

                                @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>
                            <div style="color:red">*</div>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="telefonocliente" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                            <div style="color:red">*</div>
                            <div class="col-md-6">
                                <input id="telefonocliente" type="text" class="form-control @error('telefonocliente') is-invalid @enderror" name="telefonocliente" value="{{ old('telefonocliente') }}" required autocomplete="telefonocliente" autofocus>
                                @error('telefonocliente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
           
                        <div class="form-group row">
                            <label for="fotouser" class="col-md-4 col-form-label text-md-right" >{{ __('Fotografia') }}</label>
                            <div style="color:red">*</div>                            
                            <div class="col-md-6">
                                <input style="color:red;" id="fotouser" type="file" class="@error('fotouser') is-invalid @enderror" name="fotouser" value="{{ old('fotouser') }}" accept="image/*">
                                @error('fotouser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="generocliente" class="col-md-4 col-form-label text-md-right">{{ __('Género ') }}</label>
                            <div style="color:red">*</div>
                            <div class="col-md-6">
                                <input type="radio" id="male" name="generocliente" value="Hombre">
                                <label for="Hombre">Hombre</label>&nbsp;&nbsp;
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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                            <div style="color:red">*</div>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
                            <div style="color:red">*</div>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __('Crear Cuenta') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <label style="color:red">(*)Campos obligatorios</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
