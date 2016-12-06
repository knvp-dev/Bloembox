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

@foreach($orders as $order)

<h3>Bestelling geplaatst op {{ $order->created_at }}</h3>

<ul class="orders-list is-list">
		<li class="order-price">€ {{ $order->priceInEuros() }}</li>
		@foreach($order->orderitems as $orderitem)
		<li class="orders-list-item is-list-item">
			<div class="order-item-body">
				<div class="order-item-image">
					@if($orderitem->product_id == 1)
					<img src="/images/products/{{ $orderitem->product->image}}.jpg" alt="">
					@else
					<img src="/images/cards/{{ $orderitem->product->image}}.jpg" alt="">
					@endif
				</div>
				<div class="order-item-info">
				product:
					<h3 class="order-item-title">{{ $orderitem->product->name }}</a></h3>
					<span>{{ $orderitem->product->product_type }}</span>
					@if($orderitem->product_id == 1)
					<span class="order-item-detail"><i class="fa fa-euro"></i> {{ $orderitem->product->priceInEuros() }}</span>
					@else
					<span class="order-item-detail"><i class="fa fa-euro"></i> {{ $orderitem->product->priceInEuros() }}</span>
					@endif
					@if($order->completed)
					<span class="order-item-detail"><span class="badge is-success">Verzonden</span></span>
					@elseif(!$order->payment->paid)
					<span class="order-item-detail"><span class="badge is-warning">Wachten op betaling</span></span>
					@else
					<span class="order-item-detail"><span class="badge is-info">In behandeling</span></span>
					@endif
				</div>
				<div class="order-item-info">
					@if($orderitem->product_id == 1)
					aan:
					<h3 class="order-item-detail">{{ $order->recipient }}</h3>
					@if($order->hospital)
					<span class="order-item-detail">{{ $order->hospital }} - kamer {{ $order->room }}</span>
					@endif
					<span class="order-item-detail">{{ $order->street }} {{ $order->number }}</span>
					<span class="order-item-detail">{{ $order->postalcode }} {{ $order->city }}</span>
					@else
					extra:
					<h3 class="order-item-detail">Bericht</h3>
					<span class="order-item-detail">"{{ $orderitem->extra }}"</span>
					@endif
				</div>
				@if($orderitem->product_id == 1)
				<div class="order-item-controls">
					@if($order->payment->paid)
					<a class="btn btn-groen">Factuur</a>
					@else
					<a href="/checkout/payment/create/{{ $order->payment->id }}" class="btn btn-groen">Betalen</a>
					@endif
				</div>
				@endif
			</div>
		</li>
		@endforeach
	</ul>
	@endforeach

@endsection