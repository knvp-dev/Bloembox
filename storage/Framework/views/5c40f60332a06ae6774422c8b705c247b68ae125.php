<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bloembox.be</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo e(config('app.name', 'Laravel')); ?></title>

	<!-- STYLES IMPORT -->

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:300italic,400italic,600italic,700italic,800italic,300,400,600,700">
	<link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/libs.css')); ?>">
  
  <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>

<div id="app">

<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if(Cart::count() > 0): ?>

<!-- <div class="CTA">
	<a href="#">Tip: Maak je boeket persoonlijker met een kaartje!</a>
</div> -->

<?php endif; ?>

<!-- HEADER -->

<header>
	<div class="container">
		<div class="brand">
			<a href="/"><img src="<?php echo e(asset('images/logo/logo.svg')); ?>" alt="" class="logo-brand"></a>
		</div>

		<a href="#" class="mobile-menu-toggle"><i class="fa fa-bars"></i></a>
		<ul class="menu">
			<li class="menu-item"><a href="/">Home</a></li>
			<li class="menu-item"><a href="/products/brievenbusbloemen">Brievenbusbloemen</a></li>
			<li class="menu-item"><a href="/products/boeketten">Boeketten</a></li>

			<?php if(Auth::user()): ?>

			<li class="menu-item"><a href="/account">Account</a></li>
			<li class="menu-item"><a href="/logout">Log uit</a></li>

			<?php else: ?>

			<li class="menu-item"><a href="/account/create">Registreer</a></li>
			<li class="menu-item"><a href="/login">Log in</a></li>

			<?php endif; ?>

		</ul>
	</div>

	<ul class="mobile-menu mobile-is-collapsed">
	<li><div class="brand">
			<img src="<?php echo e(asset('images/logo/logo-green.png')); ?>" alt="" class="logo-brand">
		</div></li>
			<li class="menu-item"><a href="/">Home</a></li>
			<li class="menu-item"><a href="/products/brievenbusbloemen">Brievenbusbloemen</a></li>
			<li class="menu-item"><a href="/products/boeketten">Boeketten</a></li>

			<?php if(Auth::user()): ?>

			<li class="menu-item"><a href="/account">Account</a></li>
			<li class="menu-item"><a href="/logout">Log uit</a></li>

			<?php else: ?>

			<li class="menu-item"><a href="/account/create">Registreer</a></li>
			<li class="menu-item"><a href="/login">Log in</a></li>

			<?php endif; ?>

		</ul>

</header>

<?php echo $__env->make('partials.shoppingcart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('banner'); ?>

<?php echo $__env->yieldContent('extra-full-banner'); ?>

<div class="container">

<!-- <?php echo e(Cart::content()); ?> -->
	
<?php echo $__env->yieldContent('content'); ?>

</div>

</div>

<?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>

</body>
</html>