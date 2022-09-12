<?php $__env->startSection('content'); ?>
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div>
                            <h3> Listado empleados</h3>
                        </div>

                        <?php if(\Illuminate\Support\Facades\Session::has('success')): ?>
                            <div class="alert-info">
                                <?php echo e(\Illuminate\Support\Facades\Session::get('success')); ?>

                            </div>
                        <?php endif; ?>

                        <div class="pull-right">
                            <a href="<?php echo e(route('empleado.create')); ?>" class="btn btn-success">Agregar empleado</a>
                        </div>


                        <div class="table-container">
                            <table id="tablaEmpleados" class="table table-bordered table-striped">
                                <thead>
                                    <th>Id empleado</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </thead>

                                <tbody>
                                <?php if($empleados->count()): ?>
                                    <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($empleado->id); ?></td>
                                        <td><?php echo e($empleado->nombre); ?></td>
                                        <td><?php echo e($empleado->apellido_paterno . " " . $empleado->apellido_materno); ?></td>
                                        <td><?php echo e($empleado->correo); ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="<?php echo e(route('empleado.show', $empleado->id)); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-<?php echo e($empleado->id); ?>">Eliminar</button>
                                            <!-- Modal Confirm Delete-->
                                            <div class="modal fade" id="modal-delete-<?php echo e($empleado->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="<?php echo e(route('empleado.destroy', $empleado->id)); ?>" method="post">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <?php echo e(csrf_field()); ?>

                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ¿ Desea eliminar al registro <?php echo e($empleado->nombre); ?> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Final Modal-->

                                            <a class="btn btn-primary btn-xs" href="<?php echo e(route('empleado.edit', $empleado->id)); ?>" >Editar</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5"> No hay Registros</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>