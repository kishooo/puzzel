
<?php $__env->startSection('content'); ?>

<div id="wrapper">
	<div class="main-content">
		<div class="prj-header margin-bottom-30">
			<a href="#" class="btn btn-info btn-submit-prj btn-sm waves-effect waves-light">أضف منتج جديد</a>
			<div class="result-count">10 Projects</div>
		</div>
		<!-- /.prj-header -->
		<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="prj-list row">
			<div class="col-lg-4 col-md-6 col-xs-12 margin-bottom-30">
				<a href="#" class="prj-item">
					<div class="top-project-section">
						<div class="project-icon">
							<img src="<?php echo e(asset('images/'. $product->image)); ?>" alt="">
						</div>
						<h3><?php echo e($product->title); ?></h3>
						<div class="meta">
						</div>
					</div>
				</a>
			</div>
			<!-- .col-lg-4 col-md-6 project-item -->

			<!-- .col-lg-4 col-md-6 project-item -->
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<!-- .prj-list row -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views/outOfStock.blade.php ENDPATH**/ ?>