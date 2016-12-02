@extends('layout.layout')

@section('banner')

<div class="image-banner">
    <img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
    <div class="container">
        <!-- <div class="image-banner-body">
            <h1 class="image-banner-title">Account aangemaakt</h1>
        </div> -->
    </div>
</div>

@endsection

@section('content')

<h1>success</h1>

<!-- <div class="loading-overlay">
	<div class="overlay-content">
		<div class="overlay-header">
			<h3>Account is aangemaakt!</h3>
		</div>
		<div class="overlay-body">
			<i class="fa fa-check overlay-spinner"></i>
			<p>Proficiat, uw account werd succesvol aangemaakt. U kunt nu beginnen met bestellen.</p>
		</div>
		<div class="overlay-controls">
			<a href="#">Mijn account</a>
			<a href="#">Naar de winkel</a>
		</div>
	</div>
</div> -->

@endsection