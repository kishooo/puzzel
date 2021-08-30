

<?php $__env->startSection('content'); ?>
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

            <h1 class="text-5xl uppercase bold">


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
          <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo csrf_field(); ?>
              <?php if($review->productId == $productId): ?>
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500"> <?php echo e($review->name); ?></h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">
                              <?php echo e($review->productId); ?>

                              <?php echo e($review->title); ?>

                          </a>
                          <p><?php echo e($review->content); ?></p>
                      </h2>

                  </div>


          </div>
          <?php endif; ?>



        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(Auth::user()): ?>
        <div class="flex justify-center pt-20">
            <form action="/products/review/<?php echo e($productId); ?>/<?php echo e($userId); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="block">

                  <input
                      type="text"
                      class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                      name="title"
                      placeholder="title of your reiew"
                      >

                  <input
                      type="text"
                      class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                      name="content"
                      placeholder="content of your review"
                      >

                        <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                            Submit
                        </button>
                </div>
            </form>
        </div>
        <?php else: ?>
        <p class="py-12 italic">
            Please login to add review.
        </p>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views//ProductReviews.blade.php ENDPATH**/ ?>