@extends('../layouts.Insertar')
@section('titulo')
<title>Detalle</title>
@endsection   
@section('contenido')
  <div class="form-inline">
    <h3>Cedula:&nbsp;&nbsp;&nbsp;</h3>
  <h3 >{{$cliente->idcedulacliente}}</h3>
  </div>
  <div class="form-inline">
    <h3>Nombre:&nbsp;&nbsp;&nbsp;</h3>
  <h3 >{{$cliente->nombrecliente}}</h3>
  </div>
  <div class="form-inline">
    <h3>Telefono:&nbsp;&nbsp;&nbsp;</h3>
  <h3 >{{$cliente->telefonocliente}}</h3>
  </div>
  <div class="form-inline">
  <h3 >{{$cliente->imagencliente}}</h3>
  </div>
@endsection
