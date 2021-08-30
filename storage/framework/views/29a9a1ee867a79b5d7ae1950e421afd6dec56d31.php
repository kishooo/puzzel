<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ufia</title>
        <link rel="stylesheet" href="/assets/styles/style_sheet.css">
        <link rel="icon" href="#">
        <link rel="preconnect" href="https://fonts.gstatic.com">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="#" width="150" height="60">

                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="Home.html">Home</a></li>
                        <li><a href="Products.html">Products</a></li>
                        <li><a href="#About">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#" class="button">Join</a></li>
                    </ul>
                </nav>
                <img src="shopping-bag.png" width="30px" height="30px">

            </div>
            <img src="pic.jpg" class="pic">

            <!--------------products-->
            <div class="small-container">

              <?php ($i=0); ?>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <?php if($i %3 == 0 ): ?>
                <div class="row">

              <?php endif; ?>

                <div class="col-4">
                        <img src="#">
                        <h4><?php echo e($product->productTitle); ?><br></h4>
                        <form method="post" action="/HomePage/category/<?php echo e($product->productId); ?>/<?php echo e($product->categoryId); ?>/1">
                          <?php echo csrf_field(); ?>
                            <button type="submit" class="button">Add to cart</button>
                        </form>
                        <p><?php echo e($product->price); ?> L.E</p>
                      </div>

                <?php ($i++); ?>
                <?php if($i %3==0): ?>

                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>

            </div>





        </div>
        <!-----------footer------>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Help Centerp</h3>
                    <h3>FAQs</h3>

                </div>
                <div class="footer-col-2">
                    <p>Our Purpose Is To Make The satisfiction and <br> make our product Accessible to Many</p>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                    <a href="#"><i class="fa fa-google" ></i></a>
                </div>

                <div class="footer-col-3">
                    <h3 id="contact">Contact</h3>
                    <ul>
                        <li><a href="#">info@Lectio.com</a></li>
                        <li>+20 152 125 9541</li>
                        <li>Help Center</li>
                        <li>FAQs</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class="copyright">&#169; Copyright 2021</p>
        </div>
    </div>


    </body>
</html>
<?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views/userInterface/Lamsa.blade.php ENDPATH**/ ?>