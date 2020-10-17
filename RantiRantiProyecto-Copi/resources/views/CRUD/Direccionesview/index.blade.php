@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')
<div class="col-sm-8">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> Id</th>
                <th> Calle Principal</th>
                <th > Calle Secundaria</th>
                <th > Numero de casa</th>
                <th > Foto</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{$informacion->idcedulacliente}}</td>
            <td>{{$informacion->nombrecliente}}</td>
            <td>{{$informacion->telefonocliente}}</td>
            <td>
            <td>
                <a href="{{route('informacion.show',$informacion->idcedulacliente)}}"class="btn btn-primary" >Ver direcciones</a>
            </td>
            <td>
            <a href="{{route('informacion.show',$informacion->idcedulacliente)}}"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            <form action="{{route('informacion.destroy',$informacion->idcedulacliente)}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-link btn-warning" style="color: white">Eliminar</button>
            </form>
            </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection