@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <section   >
        <div >
            <a href="{{'/admi/users'}}" class ="btn btn-primary">Usuarios</a>
            <a href="{{'/productosprotegido'}}" class ="btn btn-primary">Productos </a>
            <a href="{{'/recetasprotegido'}}" class ="btn btn-primary">Recetas </a>
            <a href="{{'/categoriasP'}}" class ="btn btn-primary">Categorias Productos </a>
            <a href="{{'/categoriasR'}}" class ="btn btn-primary">Categorias Recetas </a>
        </div>
    </section>
</div>
@endsection