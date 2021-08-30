

<?php $__env->startSection('content'); ?>
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

            <h1 class="text-5xl uppercase bold">

              <?php echo e($users[0]->name); ?>


            </h1>

        </div>

        <?php if(Auth::user()): ?>
            <div class="pt-10">
                <a
                    href="cars/create"
                    class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new car &rarr;
                </a>
            </div>
            <?php else: ?>
                <p class="py-12 italic">
                    Please login to add a new car.
                </p>
        <?php endif; ?>
        <div class="flex justify-center pt-20">
            <form action="/online/showcart/<?php echo e($users[0]->id); ?>" method="POST" enctype="multipart/form-data">
          <?php $__currentLoopData = $cartss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo csrf_field(); ?>
          <div class="w-5/6 py-10">

                  <div class="m-auto">



                      <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                          <a href="/">
                              <?php echo e($carts->title); ?>

                              <?php echo e($carts->quantity); ?>

                              <?php echo e($carts->totalPrice); ?>

                          </a>
                      </h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                          <a href="/cars/<?php echo e($carts->title); ?>">
                            price <?php echo e($carts->price); ?>


                          </a>
                        </h2>
                      <h2>total price for this product <?php echo e($carts->totalPrice); ?></h2>
                      <hr class="mt-4 mb-8">
                  </div>


          </div>

        <div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $totalPrices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalPrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo csrf_field(); ?>
          <h2>overAll price <?php echo e($totalPrice->totalPrice); ?></h2>

          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
              Submit
          </button>
          </div>
          </form>
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\ufida\resources\views/showcart.blade.php ENDPATH**/ ?>