<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @yield('titulo')
  </head>
<body>
<div class="col-sm-8">
    <h2>
        Listado de ingredientes-
        <!--a href="//route('ingredientes.create')}}"class="btn btn-primary pull-right">nuevo</a-->
    </h2>
    <form class="form-horizontal" method="POST" action="/ingredientes/create_recetas">
        @csrf
      <div class="form-inline">
        <label for="nomre" class="col-sm-2 control-label">Nombre Receta</label>
        <div>
            <input type="hidden" name="idreceta"value="{{$receta->idreceta}}">
            <input type="text" value="{{$receta->nombrereceta}}" readonly>
        </div>
      </div><br>
      <div class="form-inline">
        <label for="nompro" class="col-sm-2 control-label">Nombre del producto</label>
        <div>
            <select name="idproducto">
                @foreach($producto ?? '' as $productos)
                    <option label="{{$productos->nombreproducto}}">{{$productos->idproducto}}</option>
                @endforeach
            </select><br>
        </div>
    </div><br>
        <button type="submit" class="btn btn-success" style="text-align:center">Insertar</button>
    </form>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th> Nombre del producto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produc  as $productos)
            <tr>
            <td>{{$productos}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <a href="{{route('recetas.show',$receta->idreceta)}}" class ="btn btn-primary">Regresar</a>
</div>
</body>
</html>