@extends('layouts.app')
<?php
?>
@section('content')
<section>
    <div class="imagen_producto">
        @if ($categoria=='producto')
            <div class="descripción_producto">
                <h5 class="nombre_producto">Nombre del producto: {{$producto[0]->nombreproducto}}</h5>
                <h5 class="nombre_producto">Detalle: {{$producto[0]->detalle}}</h5>
                <h5 class="nombre_producto">Tamaño: {{$producto[0]->tamanoproducto}}</h5>
                <h5 class="descripción_precio">$ Precio: {{$producto[0]->precioproducto}}</h5>
                <input type="number" id="quantity" name="quantity" min="1" max="5">
                <input type="button" name="botón_agregar" value="Agregar al carrito">
            </div>
        @else
            <div style="background-image:url('../imagesproducto/{{$receta[0]->imagenreceta}}')"></div>
            <div class="descripción_producto">
                <h4 class="nombre_producto">Nombre de la receta: {{$receta[0]->nombrereceta}}</h4>
                <h4 class="nombre_producto">Preparación:{{$receta[0]->descripcionreceta}}</h4>
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
