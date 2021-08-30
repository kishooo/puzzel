
<?php $__env->startSection('content'); ?>



           <!-----cart Items-->
           <div class="container cart-page">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php $__currentLoopData = $itemCarts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemCart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="<?php echo e(asset('images/'. $itemCart->image)); ?>">
                            <div>
                                <p><?php echo e($itemCart->title); ?></p>
                                <small>Price per unit <?php echo e($itemCart->price); ?> EGP</small>
                            </div>
                        </div>
                    </td>
                    <td><?php echo e($itemCart->cart_itemQuantity); ?></td>
                    <td><?php echo e($itemCart->totalPrice); ?> EGP</td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
           </div>
           <div class="total-price">
            <table>
                <tr>
                    <td>Total</td>
                    <td><?php echo e($overAllTotal->totalPrice); ?> EGP</td>
                </tr>
            </table>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('userInterface.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ufida\resources\views/userInterface/cart_confirm.blade.php ENDPATH**/ ?>