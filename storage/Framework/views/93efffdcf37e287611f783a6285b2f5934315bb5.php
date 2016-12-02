<?php $__env->startSection('banner'); ?>

<div class="image-banner">
	<img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Overzicht bestelling</h1>
		</div>
	</div>
</div>

<div class="checkout-process">
	<div class="container">
		<ul class="checkout-process-list">
			<li class="cp"><i class="fa fa-shopping-cart"></i></li>
			<li class="cp"><i class="fa fa-truck"></i></li>
			<li class="cp"><i class="fa fa-credit-card-alt"></i></li>
			<li class="cp"><i class="fa fa-check"></i></li>
		</ul>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h1>Overview</h1>

<?php foreach( $orders as $order ): ?>

<div class="order-item">

	<h3>Bestelling <?php echo e($order->id); ?></h3>

	<?php foreach($order->orderitems as $orderitem): ?>

		<img src="/images/products/<?php echo e($orderitem->product->image); ?>.jpg" alt="" class="is-thumb">
		<?php echo e($orderitem->product->name); ?>


	<?php endforeach; ?>

	<span>€ <?php echo e($order->priceInEuros()); ?></span>
	<?php if(!$order->payment->paid): ?>
	<a href="/checkout/payment/create/<?php echo e($order->payment_id); ?>" class="btn btn-groen">Nu betalen</a>
	<?php else: ?>
	<a href="#" class="btn btn-groen"><i class="fa fa-check"></i> Factuur downloaden</a>
	<?php endif; ?>

</div>

<?php endforeach; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>