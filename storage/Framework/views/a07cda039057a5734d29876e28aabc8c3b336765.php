<?php $__env->startSection('banner'); ?>

<div class="image-banner">
	<img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Voeg een kaartje toe</h1>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="products-grid col-md-12 col-centered">

	<h1>Kaartjes</h1>

	<div class="product-cards row row-centered">

		<?php foreach($cards as $card): ?>

			<div class="product-card col-md-3 col-centered">
				<a href="/images/cards/<?php echo e($card->image); ?>" data-lity>
					<img src="/images/cards/<?php echo e($card->image); ?>" alt="" class="product-card-image">
				</a>
				<div class="product-card-title">
					<a href="#"><h1><?php echo e($card->name); ?></h1></a>
					
				</div>
				<div class="product-card-price">
					€<?php echo e($card->priceInEuros()); ?>

				</div>
				<?php if($card->flag == 1): ?>
				<div class="product-card-extra blue-tag">
					Populair!
				</div>
				<?php endif; ?>
				<div class="add-to-cart-btn">
					<a href="/card/<?php echo e($card->id); ?>/customization/<?php echo e($flowers_row_id); ?>"><i class="fa fa-shopping-cart"></i>
					Toevoegen aan boeket</a>
				</div>
			</div>

		<?php endforeach; ?>

	</div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>