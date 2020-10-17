@extends('../layouts.PlantillaGeneral')
@section('titulo')
<title>Laravel</title>
@endsection   
@section('contenido')

<div class="col-sm-8">
    <h2>
        Listado de productos
        <a href="{{route('productos.create')}}"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="10px"> Id</th>
                <th> Nombre del producto</th>
                <th > Tipo de Producto</th>
                <th> Cantidad en libre</th>
                <th> Precio por libra</th>
                <th> Fotografia</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producto ?? '' as $productos)
            <tr>
            <td>{{$productos->idproducto}}</td>
            <td>{{$productos->nombreproducto}}</td>
            <td>{{$productos->detalle}}</td>
            <td>{{$productos->tipoproducto}}</td>
            <td>{{$productos->tamanoproducto}}</td>
            <td>{{$productos->cantidadproducto}}</td>
            <td>{{$productos->precioproducto}}</td>
            <td>
                <img src="../imagesproducto/{{$productos->imagenproducto}}" width="75"/>
            </td>
            <td>
            <a href="{{route('productos.show',$productos->idproducto)}}"class="btn btn-primary">Editar</a>
            </td>
            <td>
            <form action="{{route('productos.destroy',$productos->idproducto)}}" method="POST">
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