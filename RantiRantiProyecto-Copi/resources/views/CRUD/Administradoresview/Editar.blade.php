@extends('../layouts.PlantillaAdministradores')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Editar administrador
</h2>
<form class="form-horizontal" method="post" action="{{route('administradores.update',$administrador->idcedulaadministrador)}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="_method" value="put">
  <div class="form-inline">
    <label for="Cedula" class="col-sm-2 control-label">Cedula</label>
    <div>
      <input type="text" name="idcedulaadministrador"value="{{$administrador->idcedulaadministrador}}"readonly >
    </div>
  </div>
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label" >Nombre del administrador</label>
    <div >
      <input type="Text" name="nombreadministrador"value="{{$administrador->nombreadministrador}}">
    </div>
  </div>
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label" >Cargo</label>
    <div >
      <input type="Text" name="cargoadministrador"value="{{$administrador->cargoadministrador}}">
    </div>
  </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">Telefono</label>
      <div >
        <input type="Text" name="telefonoadministrador"value="{{$administrador->telefonoadministrador}}">
      </div>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label" >Correo electronico</label>
      <div>
        <input type="Text" name="correoadministrador" value="{{$administrador->correoadministrador}}">
      </div>
    </div>
    <div class="form-inline">
      <label for="foto" class="col-sm-2 control-label">FOTO</label>
      <div class="form-inline">
        <img src="../imagesadmi/{{$administrador->imagenadministrador}} "width="150"/>
        <input type="file" name="imagenadministrador" accept="image/*">
      </div>
    </div>
    <div class="form-inline ">
      <div class="col-sm-offset-11 col-sm-10">
        <button type="submit" class="btn btn-success" >Actualizar</button>
      </div>
    </div>
  </form>
@endsection