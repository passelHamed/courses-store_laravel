

<?php $__env->startSection('style'); ?>
    
<?php $__env->stopSection(); ?>
<br>
<br>
<br>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <video class="mb-4" autoplay controls>
                            
                            <source src="<?php echo e(asset('upload')); ?>/<?php echo e($video->video); ?>">
                        </video>
                        <div class="row justify-content-center">
                            <div>
                                <h1 class="h4"><?php echo e($video->title); ?></h1>
                                <br>
                                <h5 class="h5"><?php echo e($video->description); ?></h5>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/project/ShowVideo.blade.php ENDPATH**/ ?>