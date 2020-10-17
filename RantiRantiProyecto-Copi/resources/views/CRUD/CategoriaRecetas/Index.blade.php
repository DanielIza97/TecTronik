@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')

<div class="col-sm-8">
    <h2>
        Listado de categorias de recetas
        <a href="{{route('categoriasR.create')}}"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px">Codigo</th>
                <th> Nombre de categorias</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categoriasr ?? '' as $categoriar)
            <tr>
            <td>{{$categoriar->idtiporeceta}}</td>
            <td>{{$categoriar->nombretiporeceta}}</td>
            <td>
            <a href="{{route('categoriasR.show',$categoriar->idtiporeceta)}}"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            <form action="{{route('categoriasR.destroy',$categoriar->idtiporeceta)}}" method="POST">
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