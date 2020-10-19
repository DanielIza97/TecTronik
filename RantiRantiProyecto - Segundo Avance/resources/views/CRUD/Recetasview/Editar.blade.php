@extends('../layouts.PlantillaRecetas')
@section('titulo')
<title>Insertar</title>
@endsection   
@section('contenido')
<h2>
    Editar Receta
</h2>
<form class="form-horizontal" method="post" action="{{route('recetasprotegido.update',$receta->idreceta)}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="_method" value="put">
  <div class="form-inline">
    <label for="id" class="col-sm-2 control-label">Id</label>
    <div>
      <input type="text" name="idreceta"value="{{$receta->idreceta}}"readonly >
    </div>
  </div>
  <div class="form-inline">
    <label for="nompro" class="col-sm-2 control-label">Tipo receta</label>
        <div>
        <select name="idtiporeceta">
          @foreach($caterece ?? '' as $categoria)
              <option label="{{$categoria->nombretiporeceta}}">{{$categoria->idtiporeceta}}</option>
          @endforeach
        </select><br>
      </div>
    </div><br>
  <div class="form-inline">
    <label for="nomrece" class="col-sm-2 control-label" >Nombre de la receta</label>
    <div >
      <input type="Text" name="nombrereceta"value="{{$receta->nombrereceta}}">
    </div>
  </div>
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label" >Descripcion</label>
    <div >
      <textarea name="descripcionreceta" rows="10" cols="50"> {{$receta->descripcionreceta}}</textarea>
    </div>
  </div>
    <div class="form-inline">
      <label for="foto" class="col-sm-2 control-label">Fotrografia</label>
      <div class="form-inline">
        <img src="../imagesreceta/{{$receta->imagenreceta}} "width="150"/>
        <input type="file" name="imagenreceta" accept="image/*">
      </div>
    </div>
    <div class="form-inline ">
      <div class="col-sm-offset-11 col-sm-10">
        <button type="submit" class="btn btn-success" >Actualizar</button>
      </div>
    </div>
  </form>
  <div style="padding-left:1%; padding-top:1%">
    <a href="/ingredientes/{{$receta->idreceta}}"class="btn btn-primary" >Agregar Ingredientes</a><br>
@endsection