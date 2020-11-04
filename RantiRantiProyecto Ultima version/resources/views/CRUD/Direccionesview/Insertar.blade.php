@extends('../layouts.PlantillaAdministradores')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Nuevo ingrediente
</h2>
<form class="form-horizontal" method="POST" action="{{route('direccion.store')}}" >
    @csrf
  <div class="form-inline">
    <label for="Cedula" class="col-sm-2 control-label">Cedula</label>
    <div>
      <input type="text" name="idcedulaadministrador">
    </div>
  </div>
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label">Nombre del Cliente</label>
    <div >
      <input type="Text" name="nombreadministrador">
    </div>
  </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">Telefono</label>
      <div >
        <input type="Text" name="telefonoadministrador">
      </div>
    </div>
    <div class="form-inline">
    <label for="correo" class="col-sm-2 control-label">Direccion de vivienda</label>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label">Calle Principal</label>
      <div >
        <input type="Text" name="calleprincipal">
      </div>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label">Calle secundaria</label>
      <div >
        <input type="Text" name="callesecundaria">
      </div>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label">Numero de casa</label>
      <div >
        <input type="Text" name="numerodecasa">
      </div>
    </div>
    <div class="form-inline">
      <label  for="imagenadministrador" class="col-sm-2 control-label">Imagen de referencia</label>
        <div class="col-sm-offset-11 col-sm-10">
        <input type="file" name="imagendireccion" accept="image/*">
        </div>
      </div>
          <button type="submit" class="btn btn-success">CREAR</button>
  </form>
@endsection