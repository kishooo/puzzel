
<?php $__env->startSection('content'); ?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?php echo e(asset('/assets/images/COVER1-Eng.jpg')); ?>" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo e(asset('/assets/images/COVER2-Eng.jpg')); ?>" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?php echo e(asset('/assets/images/COVER3-Eng.jpg')); ?>" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="container">
             <!------------Brands----------------->
             <div id="Brand" class="Brands">
                <div class="small-container">
                  <h2 class="title">Our Products</h2>
                    <div class="row col-12">
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-3">
                            <a href="/HomePage/category/<?php echo e($category->categoryId); ?>"> <img class="responsive" src="<?php echo e('data:image/png;base64,'.base64_encode( $category->smallImage ).' '); ?>"></a>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!------------featured product---------->
            <div class="small-container">
                <h2 class="title">Featured Products</h2>
                <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4">
                        <a href="/HomePage/product/description"><img src="<?php echo e('data:image/jpeg;base64,'.base64_encode( $product->image ).' '); ?>" /></a>
                        <a href="/HomePage/product/description"><h5><?php echo e($product->title); ?></h5></a>
                        <h6><?php echo e($product->price); ?> EGP</h6>
                        <form method="post" action="/HomePage/<?php echo e($product->id); ?>/1">
                          <?php echo csrf_field(); ?>
                            <button type="submit" class="button">Add to cart</Button>
                        </form>
                      
                    </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </div>





</div>
            <!---------offer--------->
            <div class="offer">
              <div class="small-container">
                  <div class="row">
                      <div class="col-2">
                          <img src="<?php echo e(asset('/assets/images/ufida.png')); ?>" class="offer-img responsive">
                      </div>
                      <div class="col-2">
                          <p>Exlusively Avaliable</p>
                          <h1>Smart band 4</h1>
                          <small>blah blah blah vgvhchffgfhjcgghggggf gyfgjgghvgvhjdhiufhkjj hfdjfhgduyfhsjkd</small>
                          <a href="#" class="button">Buy Now</a>
                      </div>
                  </div>
              </div>
          </div>


    <!-------------Feed Backs---------->
    <div class="feedback">
        <div class="small-container">
            <div class="row">
          <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p><?php echo e($review->title); ?></p>

                    <img src="Fathala.jpg">
                    <h3><?php echo e($review->name); ?></h3>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
      </div>
      <!---------About Us----->
      <div class="row">
          <div class="about" id="About">
              <h1>About Us <span><br>Ufida For Chemical Industries</span></h1>
              <p>Ufida is a leading company in the field of industrial detergents over products are of high quality
                  and competitively priced locally and conforming to European standards and public health and safety standards.
                  We strive to develop with over expertise and competencies that allows to always providing the best and we have
                  contributed to the Egyptian market, with over products by supplying to hypermarkets, hospitals, restaurants and hotels.
              </p>
              <a href="online/login" class="button">Get Started </a>
          </div>
          <div class="about">
              <img src="<?php echo e(asset('/assets/images/ufida.png')); ?>">
          </div>
      </div>


  </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('userInterface.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ufida\resources\views/userInterface/Home.blade.php ENDPATH**/ ?>