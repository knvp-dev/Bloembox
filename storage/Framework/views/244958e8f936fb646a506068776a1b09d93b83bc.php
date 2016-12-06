<?php $__env->startSection('banner'); ?>

<div class="image-banner">
    <img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
    <div class="container">
        <div class="image-banner-body">
            <h1 class="image-banner-title">Mijn account</h1>
            
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-12">

<div class="sidebar col-md-4 account-sidebar">
	
	<ul>
		<li class="sidebar-link sidebar-active"><a href="">Mijn gegevens</a></li>
		<li class="sidebar-link"><a href="/account/orders">Mijn bestellingen</a></li>
		<li class="sidebar-link"><a href="">Mijn facturen</a></li>
	</ul>

</div>

<div class="account-info col-md-8">

	<div class="account-info-list col-md-6">
		<h3>Persoonlijke gegevens</h3>
		<ul>
			<li><strong>Naam: </strong><?php echo e($account->lastname); ?></li>
			<li><strong>Voornaam: </strong><?php echo e($account->firstname); ?></li>
			<li><strong>Email: </strong><i class="fa fa-check-circle-o <?php echo e($account->confirmed ? 'confirmed' : 'notconfirmed'); ?>"></i> <?php echo e($account->email); ?></li>
		</ul>
	</div>

	<div class="account-info-list col-md-6">
		<h3>Factuur adres</h3>
		<ul>
			<li><strong>Adres: </strong><?php echo e($account->invoice_address); ?> <?php echo e($account->invoice_number); ?></li>
			<li><strong>gemeente: </strong><?php echo e($account->invoice_postalcode); ?> <?php echo e($account->invoice_city); ?></li>
		</ul>
	</div>

	<?php if(!$account->company): ?>
	<div class="account-info-list col-md-6">
		<h3>Bedrijfsgegevens</h3>
		<ul>
			<li><strong>Bedrijfsnaam: </strong><?php echo e($account->company_name); ?></li>
			<li><strong>Contactpersoon: </strong><?php echo e($account->company_contact); ?></li>
			<li><strong>Ondernemingsnummer: </strong><?php echo e($account->VAT); ?></li>
		</ul>
	</div>
	<?php endif; ?>

	<div class="clearfix"></div>

	<br>

	<a href="/account/edit" class="btn-groen">Wijzigen</a>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>