

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
          <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <form action="/products/<?php echo e($car->id); ?>/<?php echo e($users[0]->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <a
                        class="border-b-2 pb-2 border-dotted italic text-green-500"
                        href="products/review/<?php echo e($users[0]->id); ?>/<?php echo e($car->id); ?>">
                        Show Review &rarr;
                    </a>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                          <a href="/cars/<?php echo e($car->id); ?>">
                              <?php echo e($car->title); ?>

                          </a>
                      </h2>
                       <button type="submit" value="Submit">Add To Cart!</button>
                      <hr class="mt-4 mb-8">
                  </div>


          </div>
        </form>



        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <form action="/<?php echo e($users[0]->id); ?>" method="GET">
          <div class="w-5/6 py-10">

            <button type="submit" value="Submit">show cart</button>
          </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views//products.blade.php ENDPATH**/ ?>