<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Nombre del producto">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../public/css/app.css" rel="stylesheet" type="text/css">
        <title>Detalles del producto</title>
    </head>
    <body>
        <section>
            <div class="imagen_producto">
                <figure>
                    <img src="../images/Producto.jpg" alt="Producto">
                </figure>
            </div>
            <div class="descripción_producto">
                <h1 class="nombre_producto">Nombre del producto</h1>
                <p class="descripción_precio">$ Precio</p>
                <input type="number" id="quantity" name="quantity" min="1" max="5">
                <input type="button" name="botón_agregar" value="Agregar al carrito">
            </div>
        </section>
        <?php
        //echo 'Hola mundo';
        ?>
    </body>
</html>
