<?php $__env->startSection('content'); ?>
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <?php if(count($errors) >0): ?>
                    <div class="alert alert-warning">
                        <?php echo trans('validation.mesg_error_validate'); ?>


                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li> <?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Agregar Contacto</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="<?php echo e(route('datoContacto.store')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <input type="hidden" name="empleado_id" value="<?php echo e($empleadoId); ?>">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Nombre de contacto</label>
                                        <input type="text" name="nombre_contacto" id="nombre_contacto" class="form-control input-sm" placeholder="Nombre del contacto" value="<?php echo e(old('nombre_contacto')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"  value="<?php echo e(old('email')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Telefono</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="Telefono del empleado" value="<?php echo e(old('telefono')); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Direccion</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="Direccion del empleado" value="<?php echo e(old('direccion')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Ciudad</label>
                                        <input type="text" name="ciudad" id="ciudad" class="form-control input-sm" placeholder="Ciudad" value="<?php echo e(old('ciudad')); ?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Estado</label>
                                        <br>
                                        <select class="form-select" name="estado">
                                            <option selected>Seleccionar estado</option>
                                            <option value="1">Aguascalientes</option>
                                            <option value="2">Baja California </option>
                                            <option value="3">Baja California Sur</option>
                                            <option value="4">Campeche</option>
                                            <option value ="5">Chiapas</option>
                                            <option value ="6">Chihuahua</option>
                                            <option value ="7">Coahuila </option>
                                            <option value ="8">Colima</option>
                                            <option value ="9">CDMX</option>
                                            <option value ="10">Durango</option>
                                            <option value ="11">Estado de México </option>
                                            <option value ="12">Guanajuato</option>
                                            <option value ="13">Guerrero</option>
                                            <option value ="14">Hidalgo</option>
                                            <option value ="15">Jalisco</option>
                                            <option value ="16">Michoacán</option>
                                            <option value ="17">Morelos</option>
                                            <option value ="18">Nayarit</option>
                                            <option value ="19">Nuevo León</option>
                                            <option value ="20">Oaxaca</option>
                                            <option value ="21">Puebla</option>
                                            <option value ="22">Querétaro</option>
                                            <option value ="23">Quintana Roo</option>
                                            <option value ="24">San Luis Potosí</option>
                                            <option value ="25">Sinaloa</option>
                                            <option value ="26">Sonora</option>
                                            <option value ="27">Tabasco</option>
                                            <option value ="28">Tamaulipas</option>
                                            <option value ="29">Tlaxcala</option>
                                            <option value ="30">Veracruz</option>
                                            <option value ="31">Yucatán</option>
                                            <option value ="32">Zacatecas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Código Postal</label>
                                        <input type="text" name="cp" id="cp" class="form-control input-sm" placeholder="Código postal" value="<?php echo e(old('cp')); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Guardar</button>
                                    <a href="<?php echo e(route('empleado.show', $empleadoId)); ?>" class="btn btn-default"> Atras</a>
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