@extends('layouts.app')
@section('content')
<div >
    <div>
       <h4> Productos</h4>
        @foreach($categoriasp ?? '' as $categoria)
           <a href="/productos/{{$categoria->nombretipoprod}}">&nbsp;&nbsp;&nbsp; {{$categoria->nombretipoprod}}</a>
        @endforeach
        <h4>Recetas</h4>
        @foreach($categoriasr ?? '' as $categoria)
           <a href="/recetas/{{$categoria->nombretiporeceta}}">&nbsp;&nbsp;&nbsp; {{$categoria->nombretiporeceta}}</a>
        @endforeach
    </div>
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
                    <div class="card-body" >
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
