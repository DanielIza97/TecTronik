<?php $__env->startSection('titulo'); ?>
<title>Laravel</title>
<?php $__env->stopSection(); ?>   
<?php $__env->startSection('contenido'); ?>

<div class="col-sm-8">
    <h2>
        Listado de Recetas
        <a href="<?php echo e(route('recetas.create')); ?>"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> Id</th>
                <th> Nombre de la receta</th>
                <th> Detalle</th>
                <th > Fotografia</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $receta ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recetas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($recetas->idreceta); ?></td>
            <td><?php echo e($recetas->nombrereceta); ?></td>
            <td><?php echo e($recetas->descripcionreceta); ?></td>
            <td>
                <img src="../imagesrecetas/<?php echo e($recetas->imagenreceta); ?>" width="75"/>
            </td>
            <td>
            <a href="<?php echo e(route('recetas.show',$recetas->idreceta)); ?>"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            <form action="<?php echo e(route('recetas.destroy',$recetas->idreceta)); ?>" method="POST">
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
<?php echo $__env->make('../layouts.PlantillaGeneral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Documents\GitHub\NuevasTecnicas\RantiRantiProyecto\resources\views/CRUD/Recetasview/Index.blade.php ENDPATH**/ ?>