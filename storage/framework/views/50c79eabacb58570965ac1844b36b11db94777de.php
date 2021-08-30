

<?php $__env->startSection('content'); ?>
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Create product with new category or existing one
            </h1>
            <h1 class="text-5xl uppercase bold">
                Hello User <?php echo e($user); ?>

            </h1>
        </div>
    </div>
    <div class="flex justify-center pt-20">
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php echo csrf_field(); ?>
      <div class="w-5/6 py-10">

              <div class="m-auto">
                <h2 class="text-gray-700 text-5xl hover:text-gray-500"> <?php echo e($category->id); ?></h2>
                  <h2 class="text-gray-700 text-5xl hover:text-gray-100">
                      <a href="/">

                          <?php echo e($category->title); ?>

                      </a>
                  </h2>

              </div>


      </div>



    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="flex justify-center pt-20">
        <form action="/admin/create/<?php echo e($user); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="block">
                <input
                    type="file"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="image"
                    placeholder="Upload image...">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="name"
                    placeholder="Brand name...">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="quantity"
                    placeholder="quantity of the products ...">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="category"
                    placeholder="category...">

                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="price"
                    placeholder="price...">
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                    name="newPrice"
                    placeholder="newPrice...">

                    <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                        Submit
                    </button>
                    <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views/create.blade.php ENDPATH**/ ?>