

<?php $__env->startSection('style'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('theme/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
Show Explainer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<a class="btn btn-primary" href="/admin/explainers/create"><i class="fas fa-plus"></i> Create New Explainer</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Explainer</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="books-table" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>description</th>
                                <th>Courses</th>
                                <th>options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $Explainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Explainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($Explainer->name); ?></td>
                                    <td>
                                        <?php if($Explainer->description): ?>
                                            <?php echo e($Explainer->description); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $Explainer->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($loop->first ? '' : ','); ?>

                                            <?php echo e($course->title); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="/admin/explainers/<?php echo e($Explainer->id); ?>/edit"><i class="fa fa-edit"></i>Edit</a>
                                        <form action="/admin/explainers/<?php echo e($Explainer->id); ?>" method="post" class="d-inline-block">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('theme/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('theme/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script>
        $(document).ready( function () {
            $('#books-table').DataTable();
        } );
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/admin/indexExplainers.blade.php ENDPATH**/ ?>