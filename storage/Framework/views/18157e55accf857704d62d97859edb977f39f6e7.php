<?php $__env->startSection('banner'); ?>

<div class="image-banner">
    <img class="image-banner-image" src="<?php echo e(asset('images/banner/home.jpg')); ?>" alt="image banner image">
    <div class="container">
        <div class="image-banner-body">
            <h1 class="image-banner-title">Gegevens wijzigen</h1>
            
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="account-edit col-md-12">

<div class="col-md-4">
	
	<ul>
		<li class="sidebar-link"><a href="">Gegevens wijzigen</a></li>
	</ul>

</div>

<div class="col-md-8">

<form action="/account/update" method="post">
	
<div class="row">
	
	<h5>Persoonlijke gegevens</h5>

		<div class="row">
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="lastname" class="upper">Naam</label>
					<input id="lastname" type="text" placeholder="Enter name" name="lastname" class="form-control  required" value="<?php echo e($account->lastname); ?>">
				</div>
			</div>
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="firstname" class="upper">Voornaam</label>
					<input id="firstname" type="text" placeholder="Voornaam" name="firstname" class="form-control  required" value="<?php echo e($account->firstname); ?>">
				</div>
			</div>
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="email" class="upper">Email</label>
					<input id="email" type="email" placeholder="Email" name="email" class="form-control  required email"
					value="<?php echo e($account->email); ?>">
				</div>
			</div>
		</div>

		<br>
		<h5>Hebt u een bedrijf?</h5>

		<div class="row">
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="company_name" class="upper">Bedrijfsnaam</label>
					<input id="company_name" type="text" placeholder="Bedrijfsnaam" name="company_name" class="form-control  required" value="<?php echo e($account->company_name); ?>">
				</div>
			</div>
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="company_contact" class="upper">Contactpersoon</label>
					<input id="company_contact" type="text" placeholder="Contactpersoon" name="company_contact" class="form-control  required" value="<?php echo e($account->company_contact); ?>">
				</div>
			</div>
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="VAT" class="upper">Ondernemingsnummer</label>
					<input id="VAT" type="text" placeholder="BTW nr." name="VAT" class="form-control  required" value="<?php echo e($account->VAT); ?>">
				</div>
			</div>
		</div>

		<br>
		<h5>Factuuradres</h5>

		<div class="row">
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="invoice_address" class="upper">Straat</label>
					<input id="invoice_address" type="text" placeholder="Straat" name="invoice_address" class="form-control  required" value="<?php echo e($account->invoice_address); ?>">
				</div>
			</div>
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="invoice_number" class="upper">Nummer</label>
					<input id="invoice_number" type="text" placeholder="Nummer" name="invoice_number" class="form-control  required" value="<?php echo e($account->invoice_number); ?>">
				</div>
			</div>
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="invoice_postalcode" class="upper">Postcode</label>
					<input id="invoice_postalcode" type="text" placeholder="Postcode" name="invoice_postalcode" class="form-control  required" value="<?php echo e($account->invoice_postalcode); ?>">
				</div>
			</div>
			<div class="col-md-6 sep-top-xs">
				<div class="form-group">
					<label for="invoice_city" class="upper">Gemeente/Stad</label>
					<input id="invoice_city" type="text" placeholder="Gemeente/Stad" name="invoice_city" class="form-control  required" value="<?php echo e($account->invoice_city); ?>">
				</div>
			</div>
		</div>

		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
		<br>
		<button type="submit" class="btn btn-primary">Opslaan</button>
		<button class="btn btn-primary btn-goud">Annuleren</button>

	</form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>