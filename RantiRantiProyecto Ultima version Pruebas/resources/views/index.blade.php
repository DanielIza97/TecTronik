@extends('layouts.app')
@section('menu')
<div>
    <ul>
    <li> Productos</li>
    @foreach($categoriasp ?? '' as $cate)
    <ul>
    <li><a href="/productos/{{$cate->nombretipoprod}}">{{$cate->nombretipoprod}}</a></li>
    </ul>
    @endforeach
    <li>Recetas</li>
    @foreach($categoriasr ?? '' as $cate)
    <ul>
        <li><a href="/recetas/{{$cate->nombretiporeceta}}">{{$cate->nombretiporeceta}}</a></li>
    </ul>
    @endforeach
    </ul>
</div>
@endsection
@section('content')
<div >
    <div>
        <br><br> <h3 style="text-align: center">Productos</h3><br>
        @foreach($categoriasp ?? '' as $categoria)
        <div class="container">
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
        <div class="container">
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
</div>
@endsection
