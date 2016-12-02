@extends('layout.layout')

@section('banner')

<div class="image-banner">
	<img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Fresh & easy flowers</h1>
		</div>
	</div>
</div>

@endsection

@section('content')

<div class="products-grid col-md-12 col-centered">

	<h1>{{ $product_type }}</h1>

	<div class="product-cards row row-centered">

		@foreach($products as $product)

			<div class="product-card col-md-3 col-centered">
				<a href="/products/{{ $product->product_type }}/{{ $product->slug }}">
					<img src="/images/products/{{ $product->image}}.jpg" alt="boeket" class="product-card-image">
				</a>
				<div class="product-card-title">
					<a href="/products/{{ $product->product_type }}/{{ $product->slug }}"><h1>{{ $product->name }}</h1></a>
					<p>{{ $product->description }}</p>
				</div>
				<div class="product-card-price">
					€{{ $product->priceInEuros() }}
				</div>
				<div class="product-card-extra blue-tag">
					Aanrader!
				</div>
				<div>
					<a class="btn btn-groen" href="/cart/add/{{ $product->id }}"><i class="fa fa-shopping-cart"></i>
					in winkelmandje</a>
				</div>
			</div>

		@endforeach

	</div>
</div>

@endsection

