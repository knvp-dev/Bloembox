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

<?php foreach($orders as $order): ?>

<h3>Bestelling geplaatst op <?php echo e($order->created_at); ?></h3>

<ul class="orders-list is-list">
		<li class="order-price">€ <?php echo e($order->priceInEuros()); ?></li>
		<?php foreach($order->orderitems as $orderitem): ?>
		<li class="orders-list-item is-list-item">
			<div class="order-item-body">
				<div class="order-item-image">
					<?php if($orderitem->product_id == 1): ?>
					<img src="/images/products/<?php echo e($orderitem->product->image); ?>" alt="">
					<?php else: ?>
					<img src="/images/cards/<?php echo e($orderitem->product->image); ?>" alt="">
					<?php endif; ?>
				</div>
				<div class="order-item-info">
				product:
					<h3 class="order-item-title"><?php echo e($orderitem->product->name); ?></a></h3>
					<span><?php echo e($orderitem->product->product_type); ?></span>
					<?php if($orderitem->product_id == 1): ?>
					<span class="order-item-detail"><i class="fa fa-euro"></i> <?php echo e($orderitem->product->priceInEuros()); ?></span>
					<?php else: ?>
					<span class="order-item-detail"><i class="fa fa-euro"></i> <?php echo e($orderitem->product->priceInEuros()); ?></span>
					<?php endif; ?>
					<?php if($order->completed): ?>
					<span class="order-item-detail"><span class="badge is-success">Verzonden</span></span>
					<?php elseif(!$order->payment->paid): ?>
					<span class="order-item-detail"><span class="badge is-warning">Wachten op betaling</span></span>
					<?php else: ?>
					<span class="order-item-detail"><span class="badge is-info">In behandeling</span></span>
					<?php endif; ?>
				</div>
				<div class="order-item-info">
					<?php if($orderitem->product_id == 1): ?>
					aan:
					<h3 class="order-item-detail"><?php echo e($order->recipient); ?></h3>
					<?php if($order->hospital): ?>
					<span class="order-item-detail"><?php echo e($order->hospital); ?> - kamer <?php echo e($order->room); ?></span>
					<?php endif; ?>
					<span class="order-item-detail"><?php echo e($order->street); ?> <?php echo e($order->number); ?></span>
					<span class="order-item-detail"><?php echo e($order->postalcode); ?> <?php echo e($order->city); ?></span>
					<?php else: ?>
					extra:
					<h3 class="order-item-detail">Bericht</h3>
					<span class="order-item-detail">"<?php echo e($orderitem->extra); ?>"</span>
					<?php endif; ?>
				</div>
				<?php if($orderitem->product_id == 1): ?>
				<div class="order-item-controls">
					<?php if($order->payment->paid): ?>
					<a class="btn btn-groen">Factuur</a>
					<?php else: ?>
					<a href="/checkout/payment/create/<?php echo e($order->payment->id); ?>" class="btn btn-groen">Betalen</a>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endforeach; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>