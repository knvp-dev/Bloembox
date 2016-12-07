@extends('layout.layout')

@section('banner')

<div class="image-banner">
	<img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Voeg een kaartje toe</h1>
		</div>
	</div>
</div>

@endsection



@section('content')

<div class="products-grid col-md-12 col-centered">

	<h1>Kaartjes</h1>

	<div class="product-cards row row-centered">

		@foreach($cards as $card)

			<div class="product-card col-md-3 col-centered">
				<a href="/images/cards/{{ $card->image }}" data-lity>
					<img src="/images/cards/{{ $card->image }}" alt="" class="product-card-image">
				</a>
				<div class="product-card-title">
					<a href="#"><h1>{{ $card->name }}</h1></a>
					
				</div>
				<div class="product-card-price">
					€{{ $card->priceInEuros() }}
				</div>
				@if($card->flag == 1)
				<div class="product-card-extra blue-tag">
					Populair!
				</div>
				@endif
				<div class="add-to-cart-btn">
					<a href="/card/{{$card->id}}/customization/{{ $flowers_row_id }}"><i class="fa fa-shopping-cart"></i>
					Toevoegen aan boeket</a>
				</div>
			</div>

		@endforeach

	</div>
</div>


@endsection