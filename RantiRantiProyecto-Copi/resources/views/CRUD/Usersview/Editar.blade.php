@extends('../layouts.Plantillausers')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Editar Usuarios
</h2>
<form class="form-horizontal" method="post" action="{{route('users.update',$users->id)}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="_method" value="put">
  <div class="form-inline">
    <label for="Cedula" class="col-sm-2 control-label">Id</label>
    <div>
      <input type="text" name="id"value="{{$users->id}}" >
    </div>
  </div>
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label" >Nombre Usuario</label>
    <div >
      <input type="Text" name="name"value="{{$users->name}}">
    </div>
  </div>
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label" >Email</label>
    <div >
      <input type="Text" name="email"value="{{$users->email}}">
    </div>
  </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">Rol</label>
      <div >
        <input type="Text" name="rol"value="{{$users->rol}}">
      </div>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label" >Password</label>
      <div>
        <input type="Text" name="password" value="{{$users->password}}">
      </div>
    </div>
    <div class="form-inline">
      <label for="foto" class="col-sm-2 control-label">FOTO</label>
      <div class="form-inline">
        <img src="../imagesusers/{{$users->fotouser}} "width="150"/>
        <input type="file" name="fotouser" accept="image/*">
      </div>
    </div>
    <div class="form-inline ">
      <div class="col-sm-offset-11 col-sm-10">
        <button type="submit" class="btn btn-success" >Actualizar</button>
      </div>
    </div>
  </form>
@endsection