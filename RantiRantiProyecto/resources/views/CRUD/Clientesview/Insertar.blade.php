@extends('../layouts.PlantillaClientes')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Nuevo cliente
</h2>
<form class="form-horizontal" method="POST" action="{{route('clientes.store')}}"  enctype="multipart/form-data">
    @csrf
  <div class="form-inline"style="padding-left:1%; padding-top:1%">
    <label for="Cedula" class="col-sm-2 control-label">CEDULA</label>
    <div>
      <input type="text" name="idcedulacliente">
    </div>
  </div>
    <div class="form-inline"style="padding-left:1%; padding-top:1%">
      <label for="telfclien" class="col-sm-2 control-label">TELEFONO</label>
      <div >
        <input type="Text" name="telefonocliente">
      </div>
    </div>
    <div class="form-inline"style="padding-left:1%; padding-top:1%">
      <label for="nomcli" class="col-sm-2 control-label">NOMBRE DEL CLIENTE</label>
      <div >
        <input type="Text" name="nombrecliente">
      </div>
    </div>
    <div class="form-inline"style="padding-left:1%; padding-top:1%">
      <label for="correo" class="col-sm-2 control-label">CORREO</label>
      <div >
        <input type="Text" name="correocliente">
      </div>
    </div>
    <div class="form-inline" style="padding-left:1%; padding-top:1%">
      <label  for="imagencliente" class="col-sm-2 control-label">FOTO</label>
        <div class="col-sm-offset-11 col-sm-10">
        <input type="file" name="imagencliente" accept="image/*">
        </div>
      </div>
      <div style="padding-left:1%; padding-top:1%">
          <button type="submit" class="btn btn-success">CREAR</button>
  </form>
@endsection