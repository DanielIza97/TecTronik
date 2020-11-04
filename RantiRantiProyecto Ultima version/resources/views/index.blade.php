@extends('layouts.app')
@section('menu')
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupported" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupported">
    <div id="block-navegacionprincipal">
        
        <ul class="menu-menu">
            <li><p >Productos</p>
                <ul>
                    @foreach($categoriasp ?? '' as $cate)
                        <li><a class="dropdown-item"href="/productos/{{$cate->nombretipoprod}}">{{$cate->nombretipoprod}}</a></li>
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
<article>
    <div>
        <br><br> <h3 style="text-align: center">Productos</h3><br>
        @foreach($categoriasp ?? '' as $categoria)
        <div>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body"style="text-align: center">
                        <a href="/productos/{{$categoria->nombretipoprod}}"name="_method" value="put"> <img src="../imagestipoprod/{{$categoria->fototipoprod}}" width="100"/></a>
                    </div>
                    <div class="card-header"style="text-align: center">
                        <a  href="/productos/{{$categoria->nombretipoprod}}"name="_method" value="POST">{{$categoria->nombretipoprod}}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <br><br> <h3 style="text-align: center">Recetas</h3><br>
        @foreach($categoriasr ?? '' as $categoria)
        <div>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body" style="text-align: center">
                        <a href="/recetas/{{$categoria->nombretiporeceta}}"> <img src="../imagestiporeceta/{{$categoria->fototiporece  }}" width="100" /></a>
                    </div>
                    <div class="card-header"style="text-align: center;">
                        <a href="/recetas/{{$categoria->nombretiporeceta}}">{{$categoria->nombretiporeceta}}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</article>
@endsection
