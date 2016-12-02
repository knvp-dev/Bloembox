<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bloembox.be</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

	<!-- STYLES IMPORT -->

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:300italic,400italic,600italic,700italic,800italic,300,400,600,700">
	<link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/libs.css') }}">
  
  <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>

<div id="app">

@include('flash::message')

@if(Cart::count() > 0)

<!-- <div class="CTA">
	<a href="#">Tip: Maak je boeket persoonlijker met een kaartje!</a>
</div> -->

@endif

<!-- HEADER -->

<header>
	<div class="container">
		<div class="brand">
			<a href="/"><img src="{{ asset('images/logo/logo.svg') }}" alt="" class="logo-brand"></a>
		</div>

		<a href="#" class="mobile-menu-toggle"><i class="fa fa-bars"></i></a>
		<ul class="menu">
			<li class="menu-item"><a href="/">Home</a></li>
			<li class="menu-item"><a href="/products/brievenbusbloemen">Brievenbusbloemen</a></li>
			<li class="menu-item"><a href="/products/boeketten">Boeketten</a></li>

			@if(Auth::user())

			<li class="menu-item"><a href="/account">Account</a></li>
			<li class="menu-item"><a href="/logout">Log uit</a></li>

			@else

			<li class="menu-item"><a href="/account/create">Registreer</a></li>
			<li class="menu-item"><a href="/login">Log in</a></li>

			@endif

		</ul>
	</div>

	<ul class="mobile-menu mobile-is-collapsed">
	<li><div class="brand">
			<img src="{{ asset('images/logo/logo-green.png') }}" alt="" class="logo-brand">
		</div></li>
			<li class="menu-item"><a href="/">Home</a></li>
			<li class="menu-item"><a href="/products/brievenbusbloemen">Brievenbusbloemen</a></li>
			<li class="menu-item"><a href="/products/boeketten">Boeketten</a></li>

			@if(Auth::user())

			<li class="menu-item"><a href="/account">Account</a></li>
			<li class="menu-item"><a href="/logout">Log uit</a></li>

			@else

			<li class="menu-item"><a href="/account/create">Registreer</a></li>
			<li class="menu-item"><a href="/login">Log in</a></li>

			@endif

		</ul>

</header>

@include('partials.shoppingcart')

@yield('banner')

@yield('extra-full-banner')

<div class="container">

<!-- {{Cart::content()}} -->
	
@yield('content')

</div>

</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>