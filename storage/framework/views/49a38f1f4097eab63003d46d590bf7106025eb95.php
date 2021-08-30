

<?php $__env->startSection('content'); ?>
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">

            <h1 class="text-5xl uppercase bold">


            </h1>

        </div>

        <div class="flex justify-center pt-20">
          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo csrf_field(); ?>
          <form action="/admin/ShowUsers/<?php echo e($userId); ?>/<?php echo e($user->id); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
          <div class="w-5/6 py-10">

                  <div class="m-auto">
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500"> <?php echo e($user->id); ?></h2>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              <?php echo e($user->name); ?>

                          </a>
                          <p><?php echo e($user->email); ?></p>
                      </h2>
                      <?php if($user->UserType % 2 == 0): ?>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              Normal
                          </a>
                      </h2>

                      <?php else: ?>
                      <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                          <a href="/">

                              Admin
                          </a>
                      </h2>
                      <?php endif; ?>


                  </div>
                    <?php if($user->UserType % 2 == 0): ?>
                      <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                          Make Admin
                      </button>
                    <?php else: ?>

                    <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                        Make Normal
                    </button>
                    <?php endif; ?>
          </div>
        </form>



        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <p class="py-12 italic">
            Please login to add review.
        </p>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views/ShowUser.blade.php ENDPATH**/ ?>