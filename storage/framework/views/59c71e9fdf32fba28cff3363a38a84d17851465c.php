
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
                            <img src="<?php echo e('data:image/jpeg;base64,'.base64_encode( $itemCart->image ).' '); ?>">
                            <div>
                                <p><?php echo e($itemCart->title); ?></p>
                                <small>Price per unit <?php echo e($itemCart->finalProductPrice); ?> EGP</small>
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
              <form name="form">
                <?php echo csrf_field(); ?>
                <tr>
                    <td>Total</td>
                    <td><?php echo e($overAllTotal->totalPrice); ?> EGP</td>
                </tr>
                <tr>
                <td><button type="submit" onclick="javascript: form.action='/HomePage/confirm/category/ConfirmCart'; form.method='post';" class="button">confirm</button></td>
              </tr>
                </form>
            </table>

        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('userInterface.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\ufida\resources\views/userInterface/cart_confirm.blade.php ENDPATH**/ ?>