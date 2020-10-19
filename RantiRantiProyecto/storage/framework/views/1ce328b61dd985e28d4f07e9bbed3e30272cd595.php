<?php $__env->startSection('titulo'); ?>
<title>Laravel</title>
<?php $__env->stopSection(); ?>   
<?php $__env->startSection('contenido'); ?>

<div class="col-sm-8">
    <h2>
        Listado de clientes
        <a href="<?php echo e(route('clientes.create')); ?>"class="btn btn-primary pull-right">nuevo</a>
    </h2>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th with="20px"> CEDULA</th>
                <th> NOMBRE</th>
                <th > TELEFONO</th>
                <th> CORREO ELECTRONICO</th>
                <th> FOTOGRAFIA</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $clientes ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($cliente->idcedulacliente); ?></td>
            <td><?php echo e($cliente->nombrecliente); ?></td>
            <td><?php echo e($cliente->telefonocliente); ?></td>
            <td><?php echo e($cliente->correocliente); ?></td>
            <td>
                <img src="../images/<?php echo e($cliente->imagencliente); ?>" width="75"/>
            </td>
            <td>
            <a href="<?php echo e(route('clientes.show',$cliente->idcedulacliente)); ?>"class="btn btn-primary" >Editar</a>
            </td>
            <td>
            <form action="<?php echo e(route('clientes.destroy',$cliente->idcedulacliente)); ?>" method="POST">
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
<?php echo $__env->make('../layouts.PlantillaGeneral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Documents\GitHub\NuevasTecnicas\RantiRantiProyecto\resources\views/CRUD/Clientesview/Index.blade.php ENDPATH**/ ?>