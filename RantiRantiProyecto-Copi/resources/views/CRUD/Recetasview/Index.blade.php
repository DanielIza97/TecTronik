@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')

<div class="col-sm-8">
    <h2>
        Listado de Recetas
        <a href="{{route('recetas.create')}}"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> Id</th>
                <th> Nombre de la receta</th>
                <th> Detalle</th>
                <th > Fotografia</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($receta ?? '' as $recetas)
            <tr>
            <td>{{$recetas->idreceta}}</td>
            <td>{{$recetas->nombrereceta}}</td>
            <td>{{$recetas->descripcionreceta}}</td>
            <td>
                <img src="../imagesrecetas/{{$recetas->imagenreceta}}" width="75"/>
            </td>
            <td>
            <a href="{{route('recetas.show',$recetas->idreceta)}}"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            <form action="{{route('recetas.destroy',$recetas->idreceta)}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-link btn-warning" style="color: white">Eliminar</button>
            </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection