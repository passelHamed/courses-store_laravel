<?php $__env->startComponent('mail::message'); ?>
# <?php echo e($user['name']); ?>


We have successfully received your request.

<?php $__env->startComponent('mail::table'); ?>
| Title Course       | Price         |
| :--------- | :------------- |
<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
| <?php echo e($order->title); ?> | <?php echo e($order->price); ?> |
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->renderComponent(); ?>

Thanks,

<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/mails/Order-Mail.blade.php ENDPATH**/ ?>