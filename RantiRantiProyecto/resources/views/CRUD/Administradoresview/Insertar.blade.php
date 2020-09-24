@extends('../layouts.PlantillaAdministradores')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Nuevo administrador
</h2>
<form class="form-horizontal" method="POST" action="{{route('administradores.store')}}"  enctype="multipart/form-data">
    @csrf
  <div class="form-inline">
    <label for="Cedula" class="col-sm-2 control-label">Cedula</label>
    <div>
      <input type="text" name="idcedulaadministrador">
    </div>
  </div>
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label">Nombre del administrador</label>
    <div >
      <input type="Text" name="nombreadministrador">
    </div>
  </div>
  <div class="form-inline">
    <label for="car" class="col-sm-2 control-label">Cargo</label>
    <div >
      <input type="Text" name="cargoadministrador">
    </div>
  </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">Telefono</label>
      <div >
        <input type="Text" name="telefonoadministrador">
      </div>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label">Correo electronico</label>
      <div >
        <input type="Text" name="correoadministrador">
      </div>
    </div>
    <div class="form-inline">
      <label  for="imagenadministrador" class="col-sm-2 control-label">Fotografia</label>
        <div class="col-sm-offset-11 col-sm-10">
        <input type="file" name="imagenadministrador" accept="image/*">
        </div>
      </div>
          <button type="submit" class="btn btn-success">CREAR</button>
  </form>
@endsection