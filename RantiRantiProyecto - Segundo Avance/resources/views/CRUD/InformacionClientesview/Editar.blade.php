@extends('../layouts.PlantillaClientes')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
  Editar cliente
</h2>
<form class="form-horizontal" method="POST" action="{{route('informacion.update',$informacion->idcedulacliente)}}">
  @csrf
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="Cedula" class="col-sm-2 control-label">Cedula</label>
    <div>
      <input type="Text" name="idcedulacliente" value="{{$informacion->idcedulacliente}} " readonly>
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="nomcli" class="col-sm-2 control-label">Nombre del cliente</label>
    <div >
      <input type="Text" name="nombrecliente" value="{{$informacion->nombrecliente}}">
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="telfclien" class="col-sm-2 control-label">teléfono</label>
    <div >
      <input type="Text" name="telefonocliente" value="{{$informacion->telefonocliente}}">
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="telfclien" class="col-sm-2 control-label">Género</label>
    <div >
      <input type="Text" name="generocliente" value="{{$informacion->generocliente}}">
    </div>
  </div>
  <div class="form-inline ">
    <div class="col-sm-offset-11 col-sm-10">
      <button type="submit" class="btn btn-success" name="_method" value="PUT" >Actualizar</button>
    </div>
  </div>
  </form>
@endsection