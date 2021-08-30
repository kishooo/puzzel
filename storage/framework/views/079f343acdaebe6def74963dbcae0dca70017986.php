

<?php $__env->startSection('content'); ?>
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

            <h1 class="text-5xl uppercase bold">


            </h1>

        </div>

        <div class="flex justify-center pt-20">
          <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo csrf_field(); ?>
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500"> <?php echo e($order->name); ?></h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              <?php echo e($order->promo); ?>

                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              <?php echo e($order->email); ?>

                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              <?php echo e($order->city); ?>

                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              <?php echo e($order->total); ?>

                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              <?php echo e($order->type); ?>

                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                        <?php if($order->paid == 0): ?>
                          <a href="/">
                            not paid
                          </a>
                          <?php else: ?>
                          <a href="/">
                            paid
                          </a>
                          <?php endif; ?>
                      </h2>
                  </div>


          </div>



        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <p class="py-12 italic">
            Please login to add review.
        </p>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views/ShowOrders.blade.php ENDPATH**/ ?>