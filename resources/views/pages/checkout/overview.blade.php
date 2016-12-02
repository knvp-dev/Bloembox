@extends('layout.layout')

@section('banner')

<div class="image-banner">
	<img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Overzicht bestelling</h1>
		</div>
	</div>
</div>

<div class="checkout-process">
	<div class="container">
		<ul class="checkout-process-list">
			<li class="cp"><i class="fa fa-shopping-cart"></i></li>
			<li class="cp"><i class="fa fa-truck"></i></li>
			<li class="cp"><i class="fa fa-credit-card-alt"></i></li>
			<li class="cp"><i class="fa fa-check"></i></li>
		</ul>
	</div>
</div>

@endsection

@section('content')

<h1>Overview</h1>

@foreach( $orders as $order )

<div class="order-item">

	<h3>Bestelling {{ $order->id }}</h3>

	@foreach($order->orderitems as $orderitem)

		<img src="/images/products/{{ $orderitem->product->image }}.jpg" alt="" class="is-thumb">
		{{ $orderitem->product->name }}

	@endforeach

	<span>€ {{ $order->priceInEuros() }}</span>
	@if(!$order->payment->paid)
	<a href="/checkout/payment/create/{{ $order->payment_id }}" class="btn btn-groen">Nu betalen</a>
	@else
	<a href="#" class="btn btn-groen"><i class="fa fa-check"></i> Factuur downloaden</a>
	@endif

</div>

@endforeach

@endsection