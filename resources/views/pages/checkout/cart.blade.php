@extends('layout.layout')

@section('banner')

<div class="image-banner">
	<img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Kassa</h1>
		</div>
	</div>
</div>

<div class="checkout-process">
	<div class="container">
		<ul class="checkout-process-list">
			<li class="cp checkout-process-active"><i class="fa fa-shopping-cart"></i></li>
			<li class="cp"><i class="fa fa-truck"></i></li>
			<li class="cp"><i class="fa fa-credit-card-alt"></i></li>
			<li class="cp"><i class="fa fa-check"></i></li>
		</ul>
	</div>
</div>

@endsection

@section('content')

<div class="cart-overview-container">

	<h1 class="text-centered">Overzicht winkelmandje</h1>

	<br>

	<ul class="cart-overview col-md-12">

		@foreach(Cart::content() as $product)

		<li class="cart-overview-item ">
			
			<img class="cart-item-image" src="/images/products/{{ $product->model->image }}">
			
			<span class="cart-item-info">
				<h4 class="cart-item-title"><a href="/products/{{ $product->model->product_type }}/{{ $product->model->slug }}">{{ $product->model->name }}</a></h4>
				<p class="cart-item-description">{{ $product->description }}</p>
			</span>

			<span class="cart-item-price">€ {{ $product->model->priceInEuros() }}</span>

			<ul class="cart-item-controls">

				@if(!$product->options->card)
					<li>
						<a href="/cards/{{ $product->rowId }}" class="btn btn-groen btn-rounded"><i class="fa fa-plus"></i></a>
					</li>
				@endif

				<li>
					<span class="cart-item-remove">
						<a href="/cart/remove/{{ $product->rowId }}" class="btn btn-rood btn-rounded">
							<i class="fa fa-times"></i>
						</a>
					</span>
				</li>
			</ul>
			

		</li>

		@if($product->options->card)
	
		<li class="cart-overview-item card-cart-item connected-items">
			
			<img class="cart-item-image" src="/images/cards/{{ $product->options->card->image }}">
			
			<span class="cart-item-info">
				<h4 class="cart-item-title">{{ $product->options->card->name }}</h4>
				<p class="cart-item-description">Bericht: {{ $product->options->message }}</p>
			</span>

			<span class="cart-item-price">€ {{ $product->options->card->priceInEuros() }}</span>

			<ul class="cart-item-controls">

				<li>
					<a href="/products/cards/{{ $product->rowId }}" class="btn btn-groen btn-rounded"><i class="fa fa-refresh"></i></a>
				</li>
				<li>
					<a href="/card/{{ $product->options->card->id }}/customization/{{ $product->rowId }}" class="btn btn-groen btn-rounded"><i class="fa fa-paint-brush"></i></a>
				</li>

				<li>
					<span class="cart-item-remove">
						<a href="/cart/remove/card/{{ $product->rowId }}" class="btn btn-rood btn-rounded">
							<i class="fa fa-times"></i>
						</a>
					</span>
				</li>
			</ul>
		</li>
		@endif
		@endforeach

		<li class="cart-total">
			<span class="cart-total-price">Totaal (incl. BTW)<br> <strong>€ {{ Cart::total() }}</strong></span>
			<span><a href="/checkout/delivery" class="btn btn-groen">Naar levering <i class="fa fa-arrow-right"></i></a></span>
		</li>

	</ul>

	

</div>
@endsection