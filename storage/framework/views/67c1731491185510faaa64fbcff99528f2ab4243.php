

<br>
<br>
<br>
<?php $__env->startSection('content'); ?>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div id="success" style="display:none;" class="col-md-8 text-center h3 p-4 bg-success text-light rounded">
                Purchase completed successfully
            </div>
            <?php if(session('message')): ?>
                <div class="col-md-8 text-center h3 p-4 bg-success text-light rounded">
                    Purchase completed successfully
                </div>
            <?php endif; ?>
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <?php if($items->count()): ?>
                            <table class="table">
                                <thead class="thead-hight">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <?php ($totalPrice = 0); ?>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ($totalPrice += $item->price); ?>
                                    <tbody>
                                        <tr>
                                            <td scope="row"><?php echo e($item->title); ?></td>
                                            <td><?php echo e($item->price); ?> $</td>
                                            <td>
                                                <form action="<?php echo e(Route('cart.remove' , $item->id)); ?>" method="post" style="float:left;margin:auto 5px;">
                                                <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>

                            <h4 class="mb-5">Total Price : <?php echo e($totalPrice); ?> $</h4>
                            <!-- Set up a container element for the button -->
                            <div class="d-inline-block float-start" id="paypal-button-container"></div>
                            <a href="/checkout" class="d-inline-block float-start mb-4 ms-2 btn bg-cart" style="text-decoration:none;">
                                <span>credit cart</span>
                                <i class="fas fa-credit-card"></i>
                            </a>
                        <?php else: ?>
                            <div class="alert alert-info text-center">
                                There are no Courses in the cart
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return fetch('/api/paypal/create-payment',{
                        method : 'POST',
                        body: JSON.stringify({
                            'userId' : "<?php echo e(auth()->user()->id); ?>",
                        }),
                    }).then(function(res){
                        return res.json();
                    }).then(function(orderData){
                        return orderData.id;
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return fetch('/api/paypal/execute-payment', {
                        method:'POST',
                        body: Json.stringify({
                            orderId : data.orderId,
                            userId : "<?php echo e(auth()->user()->id); ?>"
                        })
                    }).then(function(res){
                        return res.json();
                    }).then(function(orderData){
                        $('#success').slideDown(200);
                        $('.card-body').slideUp(0);
                    })
                }
            }).render('#paypal-button-container');
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\server\1-web devlopment\2-back_end\2-laravel\coursesStore\resources\views/project/indexCart.blade.php ENDPATH**/ ?>