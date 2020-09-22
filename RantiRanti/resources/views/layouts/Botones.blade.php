<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @yield('titulo')
  </head>
<body>

    <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        @yield('cabecera')
    </div>
    
    <div class="menus">
        <a href="#" class ="btn btn-primary">Administradores</a>
        <a href="{{'/clientes'}}" class ="btn btn-primary">Clientes</a>
        <a href="#" class ="btn btn-primary">Productos </a>
        <a href="#" class ="btn btn-primary">Recetas </a>
    </div> 
    <div class="contenido">
        @yield('contenido')
    </div>
    <div class="pie">
        @yield('pie')
</div>
</body>
</html>