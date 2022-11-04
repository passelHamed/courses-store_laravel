

<?php $__env->startSection('style'); ?>
    
<?php $__env->stopSection(); ?>
<br>
<br>
<br>
<br>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="mb-4 h4"><?php echo e($title); ?> (<?php echo e($courses->videos->count()); ?>)</h3>
                        <?php if($courses->videos->count()): ?>
                            <ul class="list-group">
                                <?php $__currentLoopData = $courses->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="/courses/videos/<?php echo e($video->id); ?>">
                                        <li class="list-group-item">
                                            <?php echo e($video->title); ?>

                                        </li>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <div class="col-12 alert alert-info mt-4 mx-auto text-center">
                                not result
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/project/indexVideos.blade.php ENDPATH**/ ?>