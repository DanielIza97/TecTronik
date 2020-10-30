@extends('../layouts.PlantillaRecetas')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Editar Receta
</h2>
  <form class="form-horizontal" method="POST" action="{{route('categoriasR.update',$categoriasr->idtiporeceta)}}">
    @csrf
    <div class="form-inline">
      <label for="id" class="col-sm-2 control-label">Id Categoria</label>
      <div>
        <input type="text" name="idtiporeceta" value="{{$categoriasr->idtiporeceta}}">
      </div>
    </div>
    <div class="form-inline">
      <label for="nomrece" class="col-sm-2 control-label">Nombre de tipo de receta</label>
      <div >
        <input type="Text" name="nombretiporeceta" value="{{$categoriasr->nombretiporeceta}}">
      </div>
    </div>
    <div class="form-inline">
      <label for="foto" class="col-sm-2 control-label">Fotrografia</label>
      <div class="form-inline">
        <img src="../imagestiporeceta/{{$categoriasr->fototiporece}} "width="150"/>
        <input type="file" name="fototiporece" accept="image/*">
      </div>
    </div>
    <div style="padding-left:1%; padding-top:1%">
        <button type="submit" class="btn btn-success " name="_method" value="put">Actualizar</button>
    </div>
  </form>
@endsection