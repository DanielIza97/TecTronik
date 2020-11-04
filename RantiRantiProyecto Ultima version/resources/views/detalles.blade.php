@extends('layouts.app')
<?php
?>
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
<section>
    <div class="imagen_producto">
        @if ($categoria=='producto')
            <figure >
                <img src="/imagesproducto/{{$producto[0]->imagenproducto}}" alt="Producto">
            </figure>
            <div class="descripción_producto">
                <h5 class="nombre_producto">Nombre del producto: {{$producto[0]->nombreproducto}}</h5>
                <h5 class="nombre_producto">Detalle: {{$producto[0]->detalle}}</h5>
                <h5 class="nombre_producto">Tamaño: {{$producto[0]->tamanoproducto}}</h5>
                <h5 class="descripción_precio">$ Precio: {{$producto[0]->precioproducto}}</h5>
                <input type="number" id="quantity" name="quantity" min="1" max="5">
                <input type="button" name="botón_agregar" value="Agregar al carrito">
            </div>
        @else
            <figure>
                <img src="/imagesrecetas/{{$receta[0]->imagenreceta}}" alt="Receta" width="300">
            </figure> 
            <div class="descripción_producto">
                <h4 class="nombre_producto">Nombre de la receta: {{$receta[0]->nombrereceta}}</h4>
                <h4 class="nombre_producto">Procedimiento: {{$receta[0]->descripcionreceta}}</h4>
                <h4 class="nombre_producto">Ingredientes:</h4>
                @foreach ($ingredientes as $ingrediente)
                    <h5>{{$ingrediente->pivot->cantidad}} de {{$ingrediente->nombreproducto}}  </h5>
                    <input type="number" id="quantity" name="quantity" min="0.5" max="5" step="{{0.5}}" readonly>
                    <input type="button" name="botón_agregar" value="Agregar al carrito">
                @endforeach
            </div>
        @endif                
    </div>
    
</section>
@endsection
