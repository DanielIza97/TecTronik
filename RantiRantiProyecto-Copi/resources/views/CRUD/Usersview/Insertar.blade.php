@extends('../layouts.PlantillaAdministradores')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Nuevo Usuario
</h2>
<form class="form-horizontal" method="POST" action="{{route('users.store')}}"  enctype="multipart/form-data">
    @csrf
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label">Nombre Usuario</label>
    <div >
      <input type="Text" name="name">
    </div>
  </div>
  <div class="form-inline">
    <label for="car" class="col-sm-2 control-label">Email</label>
    <div >
      <input type="Text" name="email">
    </div>
  </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">Rol</label>
      <div >
        <input type="Text" name="rol">
      </div>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label">Password</label>
      <div >
        <input type="Text" name="password">
      </div>
    </div>
    <div class="form-inline">
      <label  for="imagenadministrador" class="col-sm-2 control-label">Foto Usuario</label>
        <div class="col-sm-offset-11 col-sm-10">
        <input type="file" name="fotouser" accept="image/*">
        </div>
      </div>
          <button type="submit" class="btn btn-success">CREAR</button>
  </form>
@endsection