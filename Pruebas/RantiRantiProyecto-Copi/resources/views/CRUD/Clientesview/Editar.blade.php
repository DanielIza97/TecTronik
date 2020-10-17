@extends('../layouts.PlantillaClientes')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Editar cliente
</h2>
<form class="form-horizontal" method="post" action="{{route('clientes.update',$cliente->idcedulacliente)}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="_method" value="put">
  <div class="form-inline">
    <label for="Cedula" class="col-sm-2 control-label">CEDULA</label>
    <div>
      <input type="text" name="idcedulacliente"value="{{$cliente->idcedulacliente}}"readonly >
    </div>
  </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">TELEFONO</label>
      <div >
        <input type="Text" name="telefonocliente"value="{{$cliente->telefonocliente}}">
      </div>
    </div>
    <div class="form-inline">
      <label for="nomcli" class="col-sm-2 control-label" >NOMBRE DEL CLIENTE</label>
      <div >
        <input type="Text" name="nombrecliente"value="{{$cliente->nombrecliente}}">
      </div>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label" >CORREO</label>
      <div >
        <input type="Text" name="correocliente" value="{{$cliente->correocliente}}">
      </div>
    </div>
    <div class="form-inline">
      <label for="foto" class="col-sm-2 control-label">FOTO</label>
      <div class="form-inline">
        <img src="../images/{{$cliente->imagencliente}} "width="150"/>
        <input type="file" name="imagencliente" accept="image/*">
      </div>
    </div>
    <div class="form-inline ">
      <div class="col-sm-offset-11 col-sm-10">
        <button type="submit" class="btn btn-success" >Actualizar</button>
      </div>
    </div>
  </form>
@endsection