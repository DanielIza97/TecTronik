<?php $__env->startSection('titulo'); ?>
<title>Insertar</title>
<?php $__env->stopSection(); ?>   
<?php $__env->startSection('contenido'); ?>
<h2>
    Editar administrador
</h2>
<form class="form-horizontal" method="post" action="<?php echo e(route('administradores.update',$administrador->idcedulaadministrador)); ?>" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <input type="hidden" name="_method" value="put">
  <div class="form-inline">
    <label for="Cedula" class="col-sm-2 control-label">Cedula</label>
    <div>
      <input type="text" name="idcedulaadministrador"value="<?php echo e($administrador->idcedulaadministrador); ?>"readonly >
    </div>
  </div>
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label" >Nombre del administrador</label>
    <div >
      <input type="Text" name="nombreadministrador"value="<?php echo e($administrador->nombreadministrador); ?>">
    </div>
  </div>
  <div class="form-inline">
    <label for="nomcli" class="col-sm-2 control-label" >Cargo</label>
    <div >
      <input type="Text" name="cargoadministrador"value="<?php echo e($administrador->cargoadministrador); ?>">
    </div>
  </div>
    <div class="form-inline">
      <label for="telfclien" class="col-sm-2 control-label">Telefono</label>
      <div >
        <input type="Text" name="telefonoadministrador"value="<?php echo e($administrador->telefonoadministrador); ?>">
      </div>
    </div>
    <div class="form-inline">
      <label for="correo" class="col-sm-2 control-label" >Correo electronico</label>
      <div>
        <input type="Text" name="correoadministrador" value="<?php echo e($administrador->correoadministrador); ?>">
      </div>
    </div>
    <div class="form-inline">
      <label for="foto" class="col-sm-2 control-label">FOTO</label>
      <div class="form-inline">
        <img src="../imagesadmi/<?php echo e($administrador->imagenadministrador); ?> "width="150"/>
        <input type="file" name="imagenadministrador" accept="image/*">
      </div>
    </div>
    <div class="form-inline ">
      <div class="col-sm-offset-11 col-sm-10">
        <button type="submit" class="btn btn-success" >Actualizar</button>
      </div>
    </div>
  </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.PlantillaAdministradores', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Daniel\Documents\GitHub\NuevasTecnicas\RantiRantiProyecto\resources\views/CRUD/Administradoresview/Editar.blade.php ENDPATH**/ ?>