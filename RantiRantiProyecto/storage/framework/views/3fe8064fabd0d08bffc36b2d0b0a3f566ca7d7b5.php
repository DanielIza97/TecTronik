<?php $__env->startSection('titulo'); ?>
<title>Laravel</title>
<?php $__env->stopSection(); ?>   
<?php $__env->startSection('contenido'); ?>

<div class="col-sm-8">
    <h2>
        Listado de productos
        <a href="<?php echo e(route('productos.create')); ?>"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="10px"> Id</th>
                <th> Nombre del producto</th>
                <th > Tipo de Producto</th>
                <th> Cantidad en libre</th>
                <th> Precio por libra</th>
                <th> Fotografia</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $producto ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($productos->idproducto); ?></td>
            <td><?php echo e($productos->nombreproducto); ?></td>
            <td><?php echo e($productos->tipoproducto); ?></td>
            <td><?php echo e($productos->cantidadproducto); ?></td>
            <td><?php echo e($productos->precioproducto); ?></td>
            <td>
                <img src="../imagesproducto/<?php echo e($productos->imagenproducto); ?>" width="75"/>
            </td>
            <td>
            <a href="<?php echo e(route('productos.show',$productos->idproducto)); ?>"class="btn btn-primary">Editar</a>
            </td>
            <td>
            <form action="<?php echo e(route('productos.destroy',$productos->idproducto)); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-link btn-warning" style="color: white">Eliminar</button>
            </form>
            </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.PlantillaGeneral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Documents\GitHub\NuevasTecnicas\RantiRantiProyecto\resources\views/CRUD/Productosview/Index.blade.php ENDPATH**/ ?>