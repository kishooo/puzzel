

<?php $__env->startSection('content'); ?>
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

        </div>

        <?php $__currentLoopData = $productCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h2><?php echo e($productCategory->title); ?></h2>
        <div class="flex justify-center pt-20">
          <?php $__currentLoopData = $productWithCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productWithCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($productWithCategory->categoriesId==$productCategory->categoriesId && $productWithCategory->appeared==1): ?>
            <?php echo csrf_field(); ?>
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <a
                        class="border-b-2 pb-2 border-dotted italic text-green-500"
                        href="/products/review/<?php echo e($productWithCategory->productId); ?>">
                        Show Review &rarr;
                    </a>
                    <p><?php echo e($productWithCategory->productTitle); ?></p>

                    <img
                        src="<?php echo e(asset('images/'. $productWithCategory->image)); ?>"
                        class="w-40 mb-8 shadow-xl"
                    />
                      <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                          <a href="/cars/<?php echo e($productWithCategory->id); ?>">
                              <?php echo e($productWithCategory->productTitle); ?> <?php echo e($productWithCategory->price); ?>

                          </a>
                          <img src="<?php echo e(asset($productWithCategory->image)); ?>"/>
                      </h2>
                      <?php if(!empty($productWithCategory->newPrice)): ?>
                      <p> new price <?php echo e($productWithCategory->newPrice); ?></p>
                      <?php endif; ?>
                  </div>


          </div>
        </form>

        <?php endif; ?>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <p class="py-12 italic">
            Please login to show your cart.
        </p>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views/ShowProductsOnly.blade.php ENDPATH**/ ?>