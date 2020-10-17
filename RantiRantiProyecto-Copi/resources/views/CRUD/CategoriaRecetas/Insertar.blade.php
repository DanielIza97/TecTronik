@extends('../layouts.PlantillaRecetas')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Nueva Categoria
</h2>
  <form class="form-horizontal" method="POST" action="{{route('categoriasR.store')}}">
    @csrf
    <div class="form-inline">
      <label for="id" class="col-sm-2 control-label">Id Categoria</label>
      <div>
        <input type="text" name="idtiporeceta">
      </div>
    </div>
    <div class="form-inline">
      <label for="nomrece" class="col-sm-2 control-label">Nombre de tipo de receta</label>
      <div >
        <input type="Text" name="nombretiporeceta">
      </div>
    </div>
    <div style="padding-left:1%; padding-top:1%">
        <button type="submit" class="btn btn-success">CREAR</button>
    </div>
  </form>
@endsection