@extends('layouts.app')
@section('content')
<div >
    <div>
       <h4> Productos</h4>
        @foreach($categoriasp ?? '' as $categoria)
           <div><a href=""> {{$categoria->nombretipoprod}}</a></div>
        @endforeach
        <h4>Recetas</h4>
        @foreach($categoriasr ?? '' as $categoria)
           <div><a href=""> {{$categoria->nombretiporeceta}}</a></div>
        @endforeach
    </div>
    <div>
        <br><br> <h3 style="text-align: center">Producto</h3><br>
         @foreach($categoriasp ?? '' as $categoria)
         <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <a href="/productos/{{$categoria->nombretipoprod}}"name="_method" value="POST">{{$categoria->nombretipoprod}}</a>
                        </div>
                        <div class="card-body">
                            <a href="/productos/{{$categoria->nombretipoprod}}"name="_method" value="put"> <img src="../imagestipoprod/{{$categoria->fototipoprod}}" width="75"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @endforeach
         <br><br> <h3 style="text-align: center">Recetas</h3><br>
         @foreach($categoriasr ?? '' as $categoria)
         <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <a href="/recetas/{{$categoria->nombretiporeceta}}">{{$categoria->nombretiporeceta}}</a>
                        </div>
                        <div class="card-body">
                            <a href="/recetas/{{$categoria->nombretiporeceta}}"> <img src="../imagestiporeceta/{{$categoria->fototiporece  }}" width="75"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @endforeach
     </div>
</div>
@endsection
