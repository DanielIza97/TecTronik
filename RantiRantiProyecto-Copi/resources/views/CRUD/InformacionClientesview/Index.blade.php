@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')
<div class="col-sm-8">
    @if($informacion==null)
    <h2>
        Listado de informacion
        <a href="{{route('informacion.create')}}"class="btn btn-primary pull-right">Agregar Informacion</a>
    </h2>
    @else
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> CEDULA</th>
                <th> NOMBRE</th>
                <th > TELEFONO</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>{{$informacion->idcedulacliente}}</td>
            <td>{{$informacion->nombrecliente}}</td>
            <td>{{$informacion->telefonocliente}}</td>
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
    @endif
</div>

@endsection