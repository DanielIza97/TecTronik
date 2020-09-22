@extends('../layouts.Ver')
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
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes ?? '' as $cliente)
            <tr>
            <td>{{$cliente->idcedulacliente}}</td>
            <td>{{$cliente->nombrecliente}}</td>
            <td><a href="{{route('clientes.show',$cliente->idcedulacliente)}}" class ="btn btn-primary">Detalles</a></td>
            <td>
            <form action="{{route('clientes.destroy',$cliente->idcedulacliente)}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-link btn-primary">Eliminar</button>
            </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection