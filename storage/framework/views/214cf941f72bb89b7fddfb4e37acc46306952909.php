

<?php $__env->startSection('headding'); ?>
Show Videos Course
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>
        table{
            table-layout:fixed;
        }
        table tr th{
            width:30%;
        }
        .score{
            display: block;
            font-size: 16px;
            position:relative;
            overflow: hidden;
        }
        .score-wrap{
            display: inline-block;
            position: relative;
            height: 19px
        }
        .score .stars-active{
            color: #FFCA00;
            position: relative;
            z-index: 10;
            display: block;
            overflow: hidden;
            white-space: nowrap;
        }
        .score .stars-inactive{
            color: lightgray;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<a class="btn btn-primary" href="/admin/courses/<?php echo e($courses->id); ?>/videos/create"><i class="fas fa-plus"></i> Create New Video</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div>
                            
                        </div>
                    </div>
                    <br>
                    <h3 class="mb-4 h4"><?php echo e($title); ?> (<?php echo e($courses->videos->count()); ?>)</h3>
                    <?php if($courses->videos->count()): ?>
                        <ul class="list-group">
                            <?php $__currentLoopData = $courses->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="/admin/courses/videos/<?php echo e($video->id); ?>">
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
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/admin/indexVideos.blade.php ENDPATH**/ ?>