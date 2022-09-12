<?php $__env->startSection('content'); ?>
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3> Agregar Empleado</h3>
                    </div>

                    <div class="panel-body">

                        <form method="POST" action="<?php echo e(route('empleado.store')); ?>">

                            <?php echo e(csrf_field()); ?>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.name')); ?> </label>
                                        <input type="text" id="nombre" name="nombre" placeholder="nombre" value="<?php echo e(old('nombre')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.lastname_1')); ?> </label>
                                        <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="apellido_paterno" value="<?php echo e(old('apellido_paterno')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.lastname_2')); ?> </label>
                                        <input type="text" id="apellido_materno" name="apellido_materno" placeholder="apellido_materno" value="<?php echo e(old('apellido_materno')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.birthdate')); ?> </label>
                                        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha_nacimiento" value="<?php echo e(old('fecha_nacimiento')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.gender')); ?> </label>

                                        <div class="radio">
                                            <label><input type="radio" id="genero" name="genero" value="masculino">Masculino</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" id="genero" name="genero" value="Femenino">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.address')); ?> </label>
                                        <input type="direccion" id="direccion" name="direccion" placeholder="direccion" value="<?php echo e(old('direccion')); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label"> <?php echo e(trans('forms.form_create.email')); ?> </label>
                                        <input type="email" id="correo" name="correo" placeholder="correo" value="<?php echo e(old('correo')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.phone')); ?> </label>
                                        <input type="telefono" id="telefono" name="telefono" placeholder="telefono" value="<?php echo e(old('telefono')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.code')); ?> </label>
                                        <input type="codigo_empleado" id="codigo_empleado" name="codigo_empleado" placeholder="codigo_empleado" value="<?php echo e(old('codigo_empleado')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.salary')); ?> </label>
                                        <input type="number" name="salario" id="salario" class="form-control input-sm" placeholder="Salario" value="<?php echo e(old('salario')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo e(trans('forms.form_create.currency')); ?> </label>
                                        <select class="form-control" id="tipo_moneda" name="tipo_moneda">
                                            <option value=""> >--Seleccione Tipo de Moneda--< </option>
                                        <?php $__currentLoopData = $listMonedas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moneda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($moneda); ?>"><?php echo e($moneda); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <button type="submit" class="btn btn-success"> Guardar</button>
                                <a href="<?php echo e(route('empleado.index')); ?>" class="btn btn-default">Atras</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>