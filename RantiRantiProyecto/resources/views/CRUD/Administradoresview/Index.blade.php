@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')

<div class="col-sm-8">
    <h2>
        Listado de Administradores
        <a href="{{route('administradores.create')}}"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> Cedula</th>
                <th> Nombre</th>
                <th> Cargo</th>
                <th > Telefono</th>
                <th> Correo Electronico</th>
                <th> Fotografia</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($administrador ?? '' as $administradores)
            <tr>
            <td>{{$administradores->idcedulaadministrador}}</td>
            <td>{{$administradores->nombreadministrador}}</td>
            <td>{{$administradores->cargoadministrador}}</td>
            <td>{{$administradores->telefonoadministrador}}</td>
            <td>{{$administradores->correoadministrador}}</td>
            <td>
                <img src="../imagesadmi/{{$administradores->imagenadministrador}}" width="75"/>
            </td>
            <td>
            <a href="{{route('administradores.show',$administradores->idcedulaadministrador)}}"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            <form action="{{route('administradores.destroy',$administradores->idcedulaadministrador)}}" method="POST">
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