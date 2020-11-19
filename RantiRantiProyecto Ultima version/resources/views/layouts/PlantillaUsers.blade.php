<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ranti</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @yield('titulo')
  </head>
<body>
    <div style="font-family: 'Nunito', sans-serif">
        <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            @yield('cabecera')
        </div>
        <div class="contenido">
            @yield('contenido')
        </div>
        <div class="index"style="padding-left:1%; padding-top:1%">
        <a href="/admi/users" class ="btn btn-primary">Regresar</a>
        </div> 
        <div class="pie">
            @yield('pie')
        </div>
    </div>
</body>
</html>