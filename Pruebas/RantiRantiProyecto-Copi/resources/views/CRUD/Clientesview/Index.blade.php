@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')

<div class="col-sm-8">
    <h2>
        Listado de clientes
        <a href="{{route('clientes.create')}}"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> CEDULA</th>
                <th> NOMBRE</th>
                <th > TELEFONO</th>
                <th> CORREO ELECTRONICO</th>
                <th> FOTOGRAFIA</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes ?? '' as $cliente)
            <tr>
            <td>{{$cliente->idcedulacliente}}</td>
            <td>{{$cliente->nombrecliente}}</td>
            <td>{{$cliente->telefonocliente}}</td>
            <td>{{$cliente->correocliente}}</td>
            <td>
                <img src="../images/{{$cliente->imagencliente}}" width="75"/>
            </td>
            <td>
            <a href="{{route('clientes.show',$cliente->idcedulacliente)}}"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            <form action="{{route('clientes.destroy',$cliente->idcedulacliente)}}" method="POST">
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