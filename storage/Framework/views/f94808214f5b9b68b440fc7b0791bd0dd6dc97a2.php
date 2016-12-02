<?php $__env->startSection('banner'); ?>

<div class="image-banner">
	<img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Bedankt!</h1>
		</div>
	</div>
</div>

<div class="checkout-process">
	<div class="container">
		<ul class="checkout-process-list">
			<li class="cp"><i class="fa fa-shopping-cart"></i></li>
			<li class="cp"><i class="fa fa-truck"></i></li>
			<li class="cp"><i class="fa fa-credit-card-alt"></i></li>
			<li class="cp checkout-process-active"><i class="fa fa-check"></i></li>
		</ul>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h1>Betaling geslaagd!</h1>

<p>Bedankt voor uw aankoop.</p>

<?php echo e($order->id); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>