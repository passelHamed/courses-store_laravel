

<?php $__env->startSection('headding'); ?>
Show Details Course
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
    Show Details Course (<?php echo e($Course->title); ?>)
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Show Course Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <td class="lead"><b><?php echo e($Course->title); ?></b></td>
                        </tr>
                        <tr>
                            <th>Users Ratings</th>
                            <td>
                                <span class="score">
                                    <div class="score-wrap">
                                        <span class="stars-active" style="width:<?php echo e($Course->rate()*20); ?>%;">
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
                                <span>Rating number <?php echo e($Course->ratings()->count()); ?> user</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Cover Photo</th>
                            <td><img class="img-fluid img-thumbnail" src="<?php echo e(asset('/storage/' . $Course->cover_image)); ?>" width="400" height="150"></td>
                        </tr>
                        <?php if($Course->description): ?>
                            <tr>
                                <th>description</th>
                                <td><?php echo e($Course->description); ?></td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php if($Course->publish_year): ?>
                            <tr>
                                <th>publish year</th>
                                <td><?php echo e($Course->publish_year); ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <th>number of videos</th>
                            <td><?php echo e($Course->number_of_videos); ?></td>
                        </tr>
                        <tr>
                            <th>number of hours</th>
                            <td><?php echo e($Course->number_of_hours); ?></td>
                        </tr>
                        <tr>
                            <th>price</th>
                            <td><?php echo e($Course->price); ?> $</td>
                        </tr>
                    </table>
                    <a class="btn btn-info btn-sm" href="/admin/courses/<?php echo e($Course->id); ?>/edit"><i class="fa fa-edit"></i>Edit</a>
                    <form action="/admin/Courses/<?php echo e($Course->id); ?>" method="post" class="d-inline-block">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/admin/ShowCourse.blade.php ENDPATH**/ ?>