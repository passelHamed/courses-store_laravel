

<?php $__env->startSection('style'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Video (<?php echo e($video->id); ?>)</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div>
                                <h1 class="h4"><?php echo e($video->title); ?></h1>
                                <br>
                                <h5 class="h5"><?php echo e($video->description); ?></h5>
                            </div>
                        </div>
                        <br>
                        <video class="mb-4"  muted>
                            
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/admin/ShowVideo.blade.php ENDPATH**/ ?>