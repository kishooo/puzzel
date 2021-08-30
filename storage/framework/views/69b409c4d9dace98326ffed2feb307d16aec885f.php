
<?php $__env->startSection('content'); ?>

<div id="wrapper">
	<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<form action="/admin/ShowReviewAdmin/<?php echo e($review->id); ?>/<?php echo e($userId); ?>" method="post">
		<?php echo csrf_field(); ?>
	<div class="main-content">
		<div class="row row-inline-block small-spacing">
				<div class="col-lg-4 col-md-6 col-xs-12">
				    <div class="box-content bordered info js__card">
				        <h4 class="box-title with-control">
				            <?php echo e($review->name); ?>

				            <span class="controls">
				                <button type="button" class="control fa fa-minus js__card_minus"></button>
				            </span>
				            <!-- /.controls -->
				        </h4>
				        <!-- /.box-title -->
				        <div class="js__card_content">
				            <p><?php echo e($review->title); ?></p>
										<?php if($review->published ==1): ?>
										 <button type="submit" class="btn btn-sm btn-rounded btn-danger">اخفي</button>
										<?php else: ?>
				            <button type="submit" class="btn btn-sm btn-rounded btn-success">انشر</button>
										<?php endif; ?>

				        </div>
				    </div>
				    <!-- /.box-content -->
				</div>
<!-- /.col-lg-4 col-md-6 col-xs-12 -->
      </div>
			</div>
				</form>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views/DReview.blade.php ENDPATH**/ ?>