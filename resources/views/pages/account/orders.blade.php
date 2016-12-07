@extends('layout.layout')

@section('banner')

<div class="image-banner">
    <img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
    <div class="container">
        <div class="image-banner-body">
            <h1 class="image-banner-title">Mijn account</h1>
            
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="col-md-12">

<div class="sidebar col-md-4 account-sidebar">
	
	<ul>
		<li class="sidebar-link"><a href="/account">Mijn gegevens</a></li>
		<li class="sidebar-link sidebar-active"><a href="/account/orders">Mijn bestellingen</a></li>
		<li class="sidebar-link"><a href="">Mijn facturen</a></li>
	</ul>

</div>

<div class="col-md-8">

	@foreach($orders as $order)

<h3>Bestelling geplaatst op {{ $order->created_at }}</h3>

<ul class="orders-list is-list">
		<li class="order-price">€ {{ $order->priceInEuros() }}</li>
		@foreach($order->orderitems as $orderitem)
		<li class="orders-list-item is-list-item">
			<div class="order-item-body">
				<div class="order-item-image">
					@if($orderitem->product_id == 1)
					<img src="/images/products/{{ $orderitem->product->image}}" alt="">
					@else
					<img src="/images/cards/{{ $orderitem->product->image}}" alt="">
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

</div>

</div>

@endsection