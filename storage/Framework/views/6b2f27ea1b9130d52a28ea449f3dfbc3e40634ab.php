<?php $__env->startSection('banner'); ?>

<div class="image-banner">
	<img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Kassa</h1>
		</div>
	</div>
</div>

<div class="checkout-process">
	<div class="container">
		<ul class="checkout-process-list">
			<li class="cp checkout-process-active"><i class="fa fa-shopping-cart"></i></li>
			<li class="cp"><i class="fa fa-truck"></i></li>
			<li class="cp"><i class="fa fa-credit-card-alt"></i></li>
			<li class="cp"><i class="fa fa-check"></i></li>
		</ul>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="cart-overview-container">

	<h1 class="text-centered">Overzicht winkelmandje</h1>

	<br>

	<ul class="cart-overview col-md-12">

		<?php foreach(Cart::content() as $product): ?>

		<li class="cart-overview-item ">
			
			<img class="cart-item-image" src="/images/products/<?php echo e($product->model->image); ?>.jpg">
			
			<span class="cart-item-info">
				<h4 class="cart-item-title"><a href="/products/<?php echo e($product->model->product_type); ?>/<?php echo e($product->model->slug); ?>"><?php echo e($product->model->name); ?></a></h4>
				<p class="cart-item-description"><?php echo e($product->description); ?></p>
			</span>

			<span class="cart-item-price">€ <?php echo e($product->model->priceInEuros()); ?></span>

			<ul class="cart-item-controls">

				<?php if(!$product->options->card): ?>
					<li>
						<a href="/cards/<?php echo e($product->rowId); ?>" class="btn btn-groen btn-rounded"><i class="fa fa-plus"></i></a>
					</li>
				<?php endif; ?>

				<li>
					<span class="cart-item-remove">
						<a href="/cart/remove/<?php echo e($product->rowId); ?>" class="btn btn-rood btn-rounded">
							<i class="fa fa-times"></i>
						</a>
					</span>
				</li>
			</ul>
			

		</li>

		<?php if($product->options->card): ?>
	
		<li class="cart-overview-item card-cart-item connected-items">
			
			<img class="cart-item-image" src="/images/cards/<?php echo e($product->options->card->image); ?>.jpg">
			
			<span class="cart-item-info">
				<h4 class="cart-item-title"><?php echo e($product->options->card->name); ?></h4>
				<p class="cart-item-description">Bericht: <?php echo e($product->options->message); ?></p>
			</span>

			<span class="cart-item-price">€ <?php echo e($product->options->card->priceInEuros()); ?></span>

			<ul class="cart-item-controls">

				<li>
					<a href="/products/cards/<?php echo e($product->rowId); ?>" class="btn btn-groen btn-rounded"><i class="fa fa-refresh"></i></a>
				</li>
				<li>
					<a href="/card/<?php echo e($product->options->card->id); ?>/customization/<?php echo e($product->rowId); ?>" class="btn btn-groen btn-rounded"><i class="fa fa-paint-brush"></i></a>
				</li>

				<li>
					<span class="cart-item-remove">
						<a href="/cart/remove/card/<?php echo e($product->rowId); ?>" class="btn btn-rood btn-rounded">
							<i class="fa fa-times"></i>
						</a>
					</span>
				</li>
			</ul>
		</li>
		<?php endif; ?>
		<?php endforeach; ?>

		<li class="cart-total">
			<span class="cart-total-price">Totaal (incl. BTW)<br> <strong>€ <?php echo e(Cart::total()); ?></strong></span>
			<span><a href="/checkout/delivery" class="btn btn-groen">Naar levering <i class="fa fa-arrow-right"></i></a></span>
		</li>

	</ul>

	

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>