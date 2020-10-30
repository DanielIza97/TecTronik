@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')
<div class="col-sm-8">
    @if($informacion==null)
    <h2>
        Listado de informacion
    <a href="/informacion_cliente/crear/{{$id}}"class="btn btn-primary pull-right">Agregar Informacion</a>
    </h2>
    @else
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> CEDULA</th>
                <th> NOMBRE</th>
                <th > TELEFONO</th>
                <th > GENERO</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{$informacion->idcedulacliente}}</td>
            <td>{{$informacion->nombrecliente}}</td>
            <td>{{$informacion->telefonocliente}}</td>
            <td>{{$informacion->generocliente}}</td>
            <td>
            <td>
                <a href="/direcciones/{{$informacion->idcedulacliente}}"class="btn btn-primary" >Ver direcciones</a>
            </td>
            <td>
            <a href="{{route('informacion.show',$informacion->idcedulacliente)}}"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            </td>
            </tr>
        </tbody>
    </table>
    @endif
</div>

@endsection