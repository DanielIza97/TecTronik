<?php $__env->startSection('titulo'); ?>
<title>Laravel</title>
<?php $__env->stopSection(); ?>   
<?php $__env->startSection('contenido'); ?>

<div class="col-sm-8">
    <h2>
        Listado de Administradores
        <a href="<?php echo e(route('administradores.create')); ?>"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <?php if(session('mensaje')): ?>
        <div class="alert alert-success">
            <?php echo e(session('mensaje')); ?>

        </div>
    <?php endif; ?>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> Cedula</th>
                <th> Nombre</th>
                <th> Cargo</th>
                <th > Telefono</th>
                <th> Correo Electronico</th>
                <th> Fotografia</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $administrador ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $administradores): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($administradores->idcedulaadministrador); ?></td>
            <td><?php echo e($administradores->nombreadministrador); ?></td>
            <td><?php echo e($administradores->cargoadministrador); ?></td>
            <td><?php echo e($administradores->telefonoadministrador); ?></td>
            <td><?php echo e($administradores->correoadministrador); ?></td>
            <td>
                <img src="../imagesadmi/<?php echo e($administradores->imagenadministrador); ?>" width="75"/>
            </td>
            <td>
            <a href="<?php echo e(route('administradores.show',$administradores->idcedulaadministrador)); ?>"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            <form action="<?php echo e(route('administradores.destroy',$administradores->idcedulaadministrador)); ?>" method="POST">
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
<?php echo $__env->make('../layouts.PlantillaGeneral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Documents\GitHub\NuevasTecnicas\RantiRantiProyecto\resources\views/CRUD/Administradoresview/Index.blade.php ENDPATH**/ ?>