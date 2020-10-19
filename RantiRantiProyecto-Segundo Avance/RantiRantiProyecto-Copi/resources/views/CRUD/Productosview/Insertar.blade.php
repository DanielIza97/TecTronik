@extends('../layouts.PlantillaProductos')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Nuevo cliente
</h2>
<form class="form-horizontal" method="POST" action="{{route('productos.store')}}"  enctype="multipart/form-data">
    @csrf
  <div class="form-inline">
    <label for="Idproducto" class="col-sm-2 control-label">Id producto</label>
    <div>
      <input type="text" name="idproducto">
    </div>
  </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">Nombre del producto</label>
      <div >
        <input type="Text" name="nombreproducto">
      </div>
    </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">Detalle</label>
      <div >
        <input type="Text" name="detalle">
      </div>
    </div>
    <div class="form-inline">
      <label for="nompro" class="col-sm-2 control-label">Tipo producto</label>
          <div>
          <select name="idtipoprod">
            @foreach($cateprod ?? '' as $categoria)
                <option label="{{$categoria->nombretipoprod}}">{{$categoria->idtipoprod}}</option>
            @endforeach
          </select><br>
        </div>
      </div><br>
    <div class="form-inline">
      <label for="tipprod" class="col-sm-2 control-label">Tamaño de producto</label>
      <div >
        <input type="Text" name="tamanoproducto">
      </div>
    </div>
    <div class="form-inline">
      <label for="cant" class="col-sm-2 control-label">Cantidad por cada tamaño</label>
      <div >
        <input type="Text" name="cantidadproducto">
      </div>
    </div>
    <div class="form-inline">
      <label for="pre" class="col-sm-2 control-label">Precio</label>
      <div >
        <input type="Text" name="precioproducto">
      </div>
    </div>
    <div class="form-inline">
      <label  for="imagenprod" class="col-sm-2 control-label">Fotografia</label>
        <div class="col-sm-offset-11 col-sm-10">
        <input type="file" name="imagenproducto" accept="image/*">
        </div>
      </div>
      <div style="padding-left:1%; padding-top:1%">
          <button type="submit" class="btn btn-success">CREAR</button>
  </form>
@endsection