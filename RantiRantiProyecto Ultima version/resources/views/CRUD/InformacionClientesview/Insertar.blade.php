@extends('../layouts.PlantillaClientes')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Nuevo cliente
</h2>
<form class="form-horizontal" method="POST" action="{{route('informacion.store')}}">
  @csrf
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="telfclien" class="col-sm-2 control-label">Usuario id</label>
    <div >
    <input type="Text" name="user_id" value="{{$id}}" readonly>
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="Cedula" class="col-sm-2 control-label">Cedula</label>
    <div>
      <input type="text" name="idcedulacliente">
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="nomcli" class="col-sm-2 control-label">Nombre del cliente</label>
    <div >
      <input type="Text" name="nombrecliente">
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="telfclien" class="col-sm-2 control-label">Teléfono</label>
    <div >
      <input type="Text" name="telefonocliente">
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="telfclien" class="col-sm-2 control-label">Género</label>
    <div >
      <input type="Text" name="telefonocliente">
    </div>
  </div>
  <label for="telfclien" class="col-sm-2 control-label">Direccion de vivienda</label>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="telfclien" class="col-sm-2 control-label">Codigo direccion</label>
    <div >
      <input type="Text" name="iddireccion">
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="telfclien" class="col-sm-2 control-label">Calle Principal</label>
    <div >
      <input type="Text" name="calleprincipal">
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="telfclien" class="col-sm-2 control-label">Calle Secundaria</label>
    <div >
      <input type="Text" name="callesecundaria">
    </div>
  </div>
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="telfclien" class="col-sm-2 control-label">Numero de casa</label>
    <div >
      <input type="Text" name="numerodecasa">
    </div>
  </div>
  <div class="form-inline" style="padding-left:1%; padding-top:1%">
    <label  for="imagencliente" class="col-sm-2 control-label">Foto de referencia</label>
      <div class="col-sm-offset-11 col-sm-10">
        <input type="file" name="imagendireccion" accept="image/*">
      </div>
  </div>
  <div style="padding-left:1%; padding-top:1%">
      <button type="submit" class="btn btn-success">CREAR</button>
  </div>
  </form>
@endsection