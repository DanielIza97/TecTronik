@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')

<div class="col-sm-8">
    <h2>
        Listado de categorias de productos
        <a href="{{route('categoriasP.create')}}"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px">Codigo</th>
                <th> Nombre de categorias</th>
                <th> Foto tipo</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categoriasp ?? '' as $categoriap)
            <tr>
            <td>{{$categoriap->idtipoprod}}</td>
            <td>{{$categoriap->nombretipoprod}}</td>
            <td>
                <img src="../imagestipoprod/{{$categoriap->fototipoprod}}" width="75"/>
            </td>
            <td>
            <a href="{{route('categoriasP.show',$categoriap->idtipoprod)}}"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            <form action="{{route('categoriasP.destroy',$categoriap->idtipoprod)}}" method="POST">
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