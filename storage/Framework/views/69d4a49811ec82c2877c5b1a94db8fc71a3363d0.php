<?php $__env->startSection('banner'); ?>

<div class="image-banner">
	<img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Fresh & easy flowers</h1>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="products-grid col-md-12 col-centered">

	<h1><?php echo e($product_type); ?></h1>

	<div class="product-cards row row-centered">

		<?php foreach($products as $product): ?>

			<div class="product-card col-md-3 col-centered">
				<a href="/products/<?php echo e($product->product_type); ?>/<?php echo e($product->slug); ?>">
					<img src="/images/products/<?php echo e($product->image); ?>" alt="boeket" class="product-card-image">
				</a>
				<div class="product-card-title">
					<a href="/products/<?php echo e($product->product_type); ?>/<?php echo e($product->slug); ?>"><h1><?php echo e($product->name); ?></h1></a>
					<p><?php echo e($product->description); ?></p>
				</div>
				<div class="product-card-price">
					€<?php echo e($product->priceInEuros()); ?>

				</div>
				<div class="product-card-extra blue-tag">
					Aanrader!
				</div>
				<div>
					<a class="btn btn-groen" href="/cart/add/<?php echo e($product->id); ?>"><i class="fa fa-shopping-cart"></i>
					in winkelmandje</a>
				</div>
			</div>

		<?php endforeach; ?>

	</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>