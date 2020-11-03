@extends('layouts.app')
@section('menu')
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupported" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>
<div  class="collapse navbar-collapse" id="navbarSupported">
    <div id="block-navegacionprincipal">
        
        <ul class="menu-menu dropdown-item1">
            <li><p >Productos</p>
                <ul>
                    @foreach($categoriasp ?? '' as $cate)
                        <li><a href="/productos/{{$cate->nombretipoprod}}">{{$cate->nombretipoprod}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><p>Recetas</p>
                <ul>
                    @foreach($categoriasr ?? '' as $cate)
                        <li><a href="/recetas/{{$cate->nombretiporeceta}}">{{$cate->nombretiporeceta}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
@endsection
@section('content')
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
