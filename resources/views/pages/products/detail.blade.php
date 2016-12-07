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

<div class="container">
	
	<div class="row">
		<div class="col-md-4">
			<img src="/images/products/{{ $product->image }}" alt="flowers">
		</div>
		<div class="col-md-6 col-md-offset-2">
		<h2 class="has-border-bottom">{{ $product->name }}</h2>

		<span class="flags">
			<ul>
				<li class="tag green-tag">€ {{ $product->priceInEuros() }}</li>
				<li class="blue-tag tag">Populair</li>
			</ul>
		</span>

			<div class="product-info">

				<h3>Omschrijving</h3>

				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', <br>

				making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

			</div>

			<br>
			<a href="{{ URL::previous() }}" class="btn btn-rood"><i class="fa fa-arrow-left"></i> Terug</a>
			<a class="btn btn-groen" href="/cart/add/{{ $product->id }}"><i class="fa fa-plus"></i> Toevoegen aan winkelmandje</a>
		</div>
	</div>

</div>

@endsection