

<?php $__env->startSection('content'); ?>
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                enter transcation details .
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/products/Order/transaction/<?php echo e($user); ?>/<?php echo e($orderId); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="block">

              <input
                  type="text"
                  class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                  name="type"
                  placeholder="type credit or debit ..."
                  >

              <input
                  type="text"
                  class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                  name="mode"
                  placeholder="offline cash on delivery ,cheque"
                  >

                    <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                        Submit
                    </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views/transaction.blade.php ENDPATH**/ ?>