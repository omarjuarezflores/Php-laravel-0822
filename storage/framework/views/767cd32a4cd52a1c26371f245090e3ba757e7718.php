<?php $__env->startSection('content'); ?>
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2" >
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Editar Datos</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo e(route('empleado.update',$empleado->id)); ?>" role="form">
                            <?php echo e(csrf_field()); ?>

                            <input name="_method" type="hidden" value="PUT">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado" value="<?php echo e(old('nombre',$empleado->nombre)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="paterno" id="paterno" class="form-control input-sm" placeholder="Apellido paterno del empleado" value="<?php echo e(old('apellido_paterno',$empleado->apellido_paterno)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="materno" id="materno" class="form-control input-sm" placeholder="Apellido materno del empleado" value="<?php echo e(old('apellido_materno',$empleado->apellido_materno)); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="example@algo.com" value="<?php echo e(old('email',$empleado->email)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="tel" name="telefono" id="telefono" class="form-control input-sm" placeholder="246 000 00 00" value="<?php echo e(old('telefono',$empleado->telefono)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nacimiento" id="nacimiento" class="form-control input-sm" value="<?php echo e(old('fecha-nacimiento',$empleado->fecha-nacimiento)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="Av Siempre Viva #27" value="<?php echo e(old('direccion', $empleado->direccion)); ?>">
                                    </div>
                                </div>
                                <!--<div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="codigo_empleado" id="codigo_empleado" class="form-control input-sm" placeholder="0001" value="<?php echo e(old('codigo_empleado',$empleado->codigo_empleado)); ?>">
                                    </div>
                                </div>-->
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <label for="campo_genero_h" class="form-label">Genero</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_h" <?php echo e($empleado->genero == 'masculino' ? 'checked': ''); ?> value="masculino">
                                    <label class="form-check-label" for="campo_genero_h">
                                        Hombre
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_m" <?php echo e($empleado->genero == 'femenino' ? 'checked': ''); ?> value="femenino">
                                    <label class="form-check-label" for="campo_genero_m">
                                        Mujer
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Guardar</button>
                                    <a href="<?php echo e(route('empleado.index')); ?>" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>