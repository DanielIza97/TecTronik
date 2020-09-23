@extends('../layouts.PlantillaRecetas')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Nueva Receta
</h2>
<form class="form-horizontal" method="POST" action="{{route('recetas.store')}}"  enctype="multipart/form-data">
    @csrf
  <div class="form-inline">
    <label for="id" class="col-sm-2 control-label">Id</label>
    <div>
      <input type="text" name="idreceta">
    </div>
  </div>
  <div class="form-inline">
    <label for="nomrece" class="col-sm-2 control-label">Nombre de la receta</label>
    <div >
      <input type="Text" name="nombrereceta">
    </div>
  </div>
  <div class="form-inline">
    <label for="des" class="col-sm-2 control-label">Detalle</label>
    <div >
      <textarea name="descripcionreceta" rows="10" cols="50">
      </textarea>
    </div>
  </div>
    <div class="form-inline">
      <label for="imgrec" class="col-sm-2 control-label">Fotografia</label>
      <div >
        <input type="file" name="imagenreceta" accept="image/*">
        </div>
      </div>
          <button type="submit" class="btn btn-success">CREAR</button>
  </form>
@endsection