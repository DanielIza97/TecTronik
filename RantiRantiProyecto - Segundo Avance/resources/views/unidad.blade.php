@extends('layouts.app')

@section('content')
<div>
    <h4> Productos</h4>
     @foreach($categoriasp ?? '' as $cate)
        <a href="/productos/{{$cate->nombretipoprod}}">&nbsp;&nbsp;&nbsp; {{$cate->nombretipoprod}}</a>
     @endforeach
     <h4>Recetas</h4>
     @foreach($categoriasr ?? '' as $cate)
        <a href="/recetas/{{$cate->nombretiporeceta}}">&nbsp;&nbsp;&nbsp; {{$cate->nombretiporeceta}}</a>
     @endforeach
 </div>
@if ($categoria=='Productos')
<br><br> <h3 style="text-align: center">Productos</h3><br>
    @foreach($respuesta ?? '' as $prod)
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <a href="/productos/detalle/{{$prod->nombreproducto}}"> <img src="../imagesproducto/{{$prod->imagenproducto}}" width="100"/></a>
                    </div>
                    <div class="card-header">
                        <a href="/productos/detalle/{{$prod->nombreproducto}}">{{$prod->nombreproducto}}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
<br><br> <h3 style="text-align: center">{{$categoria}}</h3><br>
@foreach($respuesta ?? '' as $produ)
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body"style="text-align: center">
                <a href="/recetas/detalle/{{$produ->nombrereceta}}"> <img src="../imagesrecetas/{{$produ->imagenreceta}}" width="100"/></a>
            </div>
            <div class="card-header"style="text-align: center">
                <a href="/recetas/detalle/{{$produ->nombrereceta}}">{{$produ->nombrereceta}}</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
         
@endsection
