@extends('../layouts.Insertar')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')

<form class="form-horizontal">
  <div class="form-inline">
    <label for="Cedula" class="col-sm-2 control-label">CEDULA</label>
    <div>
      <input type="text" class="form-control" >
    </div>
  </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">TELEFONO</label>
      <div >
        <input type="Text" class="form-control">
      </div>
    </div>
    <div class="form-inline">
      <label for="nomcli" class="col-sm-2 control-label">NOMBRE DEL CLIENTE</label>
      <div >
        <input type="Text" class="form-control">
      </div>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label">CORREO</label>
      <div >
        <input type="Text" class="form-control">
      </div>
    </div><div class="form-inline">
      <label for="direccion" class="col-sm-2 control-label">FOTO</label>
      <div >
        <input type="Img" class="form-control">
      </div>
    </div>
    <div class="form-inline ">
      <div class="col-sm-offset-11 col-sm-10">
        <button type="submit" class="btn btn-success">CREAR</button>
      </div>
    </div>
  </form>
@endsection