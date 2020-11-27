@extends('layouts.app')
@section('content')
<article class="m5">
@if ($categoria=='Productos')
<div >
    <h3 class="container text-bg-left">{{$request}}</h3>
        <div class="offset-md-1 row justify-content-center m">
            @foreach($respuesta ?? '' as $prod)
                <div class="card1 ">
                    <a href="/productos/detalle/{{$prod->nombreproducto}}">
                    <img src="/imagesproducto/{{$prod->imagenproducto}}" class="card card-img-top align-self-center custom-control-inline" alt="'Sin foto'">
                    <div class="card-body1 dropdown-item mt-5">{{$prod->nombreproducto}}</div>
                    </a>
                </div>
            @endforeach
    </div>
</div>
@else
<div>
    <h3 class="container text-bg-left">{{$request}}</h3>
        <div class="offset-md-1 row justify-content-center m">
            @foreach($respuesta ?? '' as $produ)
                <div class="card1 ">
                    <a href="/recetas/detalle/{{$produ->nombrereceta}}">
                    <img src="/imagesrecetas/{{$produ->imagenreceta}}" class="card card-img-top align-self-center custom-control-inline" alt="'Sin foto'">
                    <div class="card-body1 dropdown-item mt-5">{{$produ->nombrereceta}}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif 
</article>
@endsection
