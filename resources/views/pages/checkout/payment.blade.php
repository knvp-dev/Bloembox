@extends('layout.layout')

@section('banner')

<div class="image-banner">
	<img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Betaling</h1>
		</div>
	</div>
</div>

<div class="checkout-process">
	<div class="container">
		<ul class="checkout-process-list">
			<li class="cp"><i class="fa fa-shopping-cart"></i></li>
			<li class="cp"><i class="fa fa-truck"></i></li>
			<li class="cp checkout-process-active"><i class="fa fa-credit-card-alt"></i></li>
			<li class="cp"><i class="fa fa-check"></i></li>
		</ul>
	</div>
</div>

@endsection

@section('content')

<a href="/checkout/payment/create">create payment</a>


@endsection