<?php $__env->startSection('banner'); ?>

<div class="image-banner">
	<img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Voeg een boodschap toe aan het kaartje</h1>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-12">

    <div class="col-md-6">
        
        <img class="is-medium-image" src="/images/cards/<?php echo e($card->image); ?>.jpg" alt="">

    </div>


    <form action="/card/details/save" class="card-detail-form col-md-6" method="post">

    <h1>Voeg een boodschap toe</h1>

    <br>

      <div class="form-group col-md-12">
        <label for="message" class="sr-only">Boodschap</label>
        <textarea type="text" class="form-control" name="message" placeholder="Boodschap" required ><?php echo e($cart_item->options->message); ?></textarea>
      </div>

      <input type="hidden" name="flowers_row_id" value="<?php echo e($cart_item->rowId); ?>">
      <input type="hidden" name="card_id" value="<?php echo e($card->id); ?>">

      <?php echo e(csrf_field()); ?>


      <button type="submit" class="btn btn-default">Bevestigen</button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>