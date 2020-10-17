@extends('../layouts.PlantillaProductos')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Editar producto
</h2>
<form class="form-horizontal" method="post" action="{{route('productos.update',$producto->idproducto)}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="_method" value="put">
  <div class="form-inline">
    <label for="Idproducto" class="col-sm-2 control-label">Id producto</label>
    <div>
      <input type="text" name="idproducto"value="{{$producto->idproducto}}" >
    </div>
  </div>
  <div class="form-inline">
    <label for="telfclien" class="col-sm-2 control-label">Nombre del producto</label>
    <div >
      <input type="Text" name="nombreproducto"value="{{$producto->nombreproducto}}">
    </div>
  </div>
  <div class="form-inline">
    <label for="telfclien" class="col-sm-2 control-label">Detalle</label>
    <div >
      <input type="Text" name="detalle"value="{{$producto->detalle}}">
    </div>
  </div>
  <div class="form-inline">
    <label for="tipprod" class="col-sm-2 control-label">Tipo de producto</label>
    <div >
      <input type="Text" name="tipoproducto" value="{{$producto->tipoproducto}}">
    </div>
  </div>
  <div class="form-inline">
    <label for="tipprod" class="col-sm-2 control-label">Tamaño de producto</label>
    <div >
      <input type="Text" name="tamanoproducto" value="{{$producto->tamanoproducto}}">
    </div>
  </div>
  <div class="form-inline">
    <label for="cant" class="col-sm-2 control-label">Cantidad en libras</label>
    <div >
      <input type="Text" name="cantidadproducto"value="{{$producto->cantidadproducto}}">
    </div>
  </div>
  <div class="form-inline">
    <label for="pre" class="col-sm-2 control-label">Precio</label>
    <div >
      <input type="Text" name="precioproducto"value="{{$producto->precioproducto}}">
    </div>
  </div>
  <div class="form-inline">
    <label  for="imagenprod" class="col-sm-2 control-label">Fotografia</label>
    <div class="col-sm-offset-11 col-sm-10">
      <img src="../imagesproducto/{{$producto->imagenproducto}} "width="150"/>
      <input type="file" name="imagenproducto" accept="image/*">
    </div>
    </div>
        </div>
    <div class="form-inline ">
      <div class="col-sm-offset-11 col-sm-10">
        <button type="submit" class="btn btn-success" >Actualizar</button>
      </div>
    </div>
  </form>
@endsection