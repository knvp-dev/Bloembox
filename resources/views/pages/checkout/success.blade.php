@extends('layout.layout')

@section('banner')

<div class="image-banner">
	<img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Bedankt!</h1>
		</div>
	</div>
</div>

<div class="checkout-process">
	<div class="container">
		<ul class="checkout-process-list">
			<li class="cp"><i class="fa fa-shopping-cart"></i></li>
			<li class="cp"><i class="fa fa-truck"></i></li>
			<li class="cp"><i class="fa fa-credit-card-alt"></i></li>
			<li class="cp checkout-process-active"><i class="fa fa-check"></i></li>
		</ul>
	</div>
</div>

@endsection

@section('content')

<h1>Betaling geslaagd!</h1>

<p>Bedankt voor uw aankoop.</p>

{{ $order->id }}

@endsection