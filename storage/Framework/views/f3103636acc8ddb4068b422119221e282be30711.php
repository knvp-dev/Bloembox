<?php $__env->startSection('banner'); ?>

<div class="image-banner">
	<img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Informatie levering</h1>
		</div>
	</div>
</div>

<div class="checkout-process">
	<div class="container">
		<ul class="checkout-process-list">
			<li class="cp"><a href="/checkout"><i class="fa fa-shopping-cart"></i></a></li>
			<li class="cp checkout-process-active"><i class="fa fa-truck"></i></li>
			<li class="cp"><i class="fa fa-credit-card-alt"></i></li>
			<li class="cp"><i class="fa fa-check"></i></li>
		</ul>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="delivery-information">

	<div class="delivery-items-list col-md-3">
		<ul>

		<h3>Bestellingen</h3>

		<hr>

		<?php foreach(Cart::content() as $item): ?>

		<?php if($cart_rowId == $item->rowId): ?>
		<h3>Geselecteerde bestelling</h3>
		<?php endif; ?>
			
				<li class="delivery-items-list-item <?php if($cart_rowId == $item->rowId): ?> delivery-item-selected <?php endif; ?>">
					<span><img src="/images/products/<?php echo e($item->model->image); ?>" class="product-thumbnail" /></span>
					<div class="delivery-item-info">
						<span><?php echo e($item->model->name); ?></span>
					</div>
					<!-- <div class="delivery-info-status">
						<i class="fa fa-check-circle not-ok"></i>
					</div> -->
				</li>

		<?php if($item->options->card): ?>

		<li class="delivery-items-list-item <?php if($cart_rowId == $item->rowId): ?> delivery-item-selected <?php endif; ?>">
			<span><img src="/images/cards/<?php echo e($item->options->card->image); ?>" class="product-thumbnail" /></span>
			<div class="delivery-item-info">
				<span><?php echo e($item->options->card->name); ?></span>
			</div>
		</li>

		<?php endif; ?>

		<?php endforeach; ?>
		</ul>
	</div>
	
	<form action="/checkout/order/create" class="delivery-address-form <?php if($cart_rowId == 1): ?> is-always-opace <?php endif; ?>" method="post">

	<?php echo e(csrf_field()); ?>


	<div class="col-md-4 col-md-offset-1">
		<h3>Adresgegevens ontvanger</h3>
		<br>
		<div class="form-group">
			<label for="recipient">Naam ontvanger</label>
			<input type="text" class="form-control" name="recipient" placeholder="Naam ontvanger">
		</div>

		<div class="form-group">
			<label for="street">Straat</label>
			<input type="text" class="form-control" name="street" placeholder="Straat">
		</div>

		<div class="form-group">
			<label for="number">Nummer</label>
			<input type="text" class="form-control" name="number" placeholder="Nummer">
		</div>

		<div class="form-group">
			<label for="postalcode">Postcode</label>
			<input type="text" class="form-control" name="postalcode" placeholder="Postcode">
		</div>

		<div class="form-group">
			<label for="city">Gemeente</label>
			<input type="text" class="form-control" name="city" placeholder="Gemeente">
		</div>
	</div>

	<div class="col-md-4">

		<h3>Afleveren in een ziekenhuis? </h3> <br>

		<div class="form-group">
			<label for="hospital">Naam ziekenhuis</label>
			<input type="text" class="form-control" name="hospital" placeholder="Naam ziekenhuis">
		</div>

		<div class="form-group">
			<label for="room">Wat is het kamernummer?</label>
			<input type="text" class="form-control" name="room" placeholder="kamernummer">
		</div>

		<h3>Specifieke leverdatum?</h3> 
		<br>

		<div class="form-group">
			<label for="deliverydate">Datum</label>
			<input type="date" class="form-control" name="deliverydate" placeholder="Datum">
		</div>

		<hr>

		<input type="hidden" value="<?php echo e($cart_rowId); ?>" name="cart_rowId">


		<?php if($cart_rowId != 1): ?>
		<div class="form-group">
			<input type="submit" class="btn btn-groen pull-right" value="Bestelling plaatsen">
		</div>
		<?php endif; ?>
	</div>
	</form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>