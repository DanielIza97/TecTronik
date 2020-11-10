@extends('layouts.app')
@section('content')
<article>
@if ($categoria=='Productos')
<div >
    <h3 class="container text-bg-left">{{$request}}</h3><br>
    <div class="row justify-content-center">
        @foreach($respuesta ?? '' as $prod)
            <div class="card">
                <a href="/productos/detalle/{{$prod->nombreproducto}}">
                    <div class="card-body" style="background-image:url('../imagesproducto/{{$prod->imagenproducto}}')"></div>
                </a>
                <div class="card-header text-lg-center">
                    <a class="dropdown-item" href="/productos/detalle/{{$prod->nombreproducto}}">{{$prod->nombreproducto}}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@else
<div>
    <h3 class="container text-bg-left">{{$request}}</h3>
    <div>
        <div class="row justify-content-center">
            @foreach($respuesta ?? '' as $produ)
            <div class="card">
                <a href="/recetas/detalle/{{$produ->nombrereceta}}">
                    <div class="card-body text-lg-center"style="background-image:url('../imagesrecetas/{{$produ->imagenreceta}}')"></div>
                </a>
                <div class="card-header text-lg-center">
                    <a class="dropdown-item" href="/recetas/detalle/{{$produ->nombrereceta}}">{{$produ->nombrereceta}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif 
</article>
@endsection
