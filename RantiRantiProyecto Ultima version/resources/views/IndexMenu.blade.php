@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <section   >
        <div >
            <a href="{{'/admi/users'}}" class ="btn btn-add">Usuarios</a>
            <a href="{{'/productosprotegido'}}" class ="btn btn-add">Productos </a>
            <a href="{{'/recetasprotegido'}}" class ="btn btn-add">Recetas </a>
            <a href="{{'/categoriasP'}}" class ="btn btn-add">Categorias Productos </a>
            <a href="{{'/categoriasR'}}" class ="btn btn-add">Categorias Recetas </a>
            <a href="{{'/pedidos'}}" class ="btn btn-add">Ver pedidos</a>
        </div>
    </section>
</div>
@endsection