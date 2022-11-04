

<?php $__env->startSection('style'); ?>
    <style>
        body{
            background:#fff
        }
        .ratings i{
            font-size: 16px;
            color: red;
        }
        .strike-text{
            color: red;
            text-decoration: line-through;
        }
        .product-image{
            width: 100%
        }
        .dot{
            height: 7px;
            width: 7px;
            margin-left: 6px;
            margin-right: 6px;
            margin-top: 3px;
            background-color: blue;
            border-radius: 50%;display: inline-block
        }
        .spec-1{
            color: #938787;
            font-size: 15px
        }
        h5{
            font-weight: 400
        }
        .para{
            font-size: 16px
        }
    </style>
<?php $__env->stopSection(); ?>

<br>
<br>
<br>
<br>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <a href="/" class="btn btn-primary mb-5">
            <i class="fas fa-plus"></i>
            Buy New Course
        </a>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <?php if($myCourses->count()): ?>
                    <?php $__currentLoopData = $myCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                        <div class="row p-2 bg-white border rounded shadow">
                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="<?php echo e(asset('storage/' . $course->cover_image)); ?>"></div>
                            <div class="col-md-6 my-auto">
                                <h5><a href="/courses/<?php echo e($course->id); ?>"><?php echo e($course->title); ?></a></h5>
                                <div class="d-flex flex-row">
                                    <div>
                                        <span class="score">
                                            <div class="score-wrap">
                                                <span class="stars-active" style="width:<?php echo e($course->rate()*20); ?>%;">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </span>
                                                <span class="stars-inactive">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-1 mb-1"><span><?php echo e($course->Explainer != null ? $course->Explainer->name : ''); ?></span></div>
                                <div class="mt-1 mb-1"><span>date of purchase : <?php echo e($course->pivot->created_at->diffForHumans()); ?><br></span></div>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left my-auto">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1"><?php echo e($course->pivot->price); ?> $</h4>
                                </div>
                                <h6 class="text-success">total summation : <?php echo e($course->pivot->price); ?> $</h6>
                                <div class="d-flex flex-column mt-4"><a href="/courses/<?php echo e($course->id); ?>/videos" class="btn btn-outline-primary btn-sm" type="button">videos course</a></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="alert alert-danger mx-auto" role="alert">
                        You haven't bought anything yet
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/project/myPurchases.blade.php ENDPATH**/ ?>