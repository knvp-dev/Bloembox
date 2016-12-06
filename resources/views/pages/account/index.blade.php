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
		<li class="sidebar-link sidebar-active"><a href="">Mijn gegevens</a></li>
		<li class="sidebar-link"><a href="/account/orders">Mijn bestellingen</a></li>
		<li class="sidebar-link"><a href="">Mijn facturen</a></li>
	</ul>

</div>

<div class="account-info col-md-8">

	<div class="account-info-list col-md-6">
		<h3>Persoonlijke gegevens</h3>
		<ul>
			<li><strong>Naam: </strong>{{ $account->lastname }}</li>
			<li><strong>Voornaam: </strong>{{ $account->firstname }}</li>
			<li><strong>Email: </strong><i class="fa fa-check-circle-o {{ $account->confirmed ? 'confirmed' : 'notconfirmed' }}"></i> {{ $account->email }}</li>
		</ul>
	</div>

	<div class="account-info-list col-md-6">
		<h3>Factuur adres</h3>
		<ul>
			<li><strong>Adres: </strong>{{ $account->invoice_address }} {{ $account->invoice_number }}</li>
			<li><strong>gemeente: </strong>{{ $account->invoice_postalcode }} {{ $account->invoice_city }}</li>
		</ul>
	</div>

	@if(!$account->company)
	<div class="account-info-list col-md-6">
		<h3>Bedrijfsgegevens</h3>
		<ul>
			<li><strong>Bedrijfsnaam: </strong>{{ $account->company_name }}</li>
			<li><strong>Contactpersoon: </strong>{{ $account->company_contact }}</li>
			<li><strong>Ondernemingsnummer: </strong>{{ $account->VAT }}</li>
		</ul>
	</div>
	@endif

	<div class="clearfix"></div>

	<br>

	<a href="/account/edit" class="btn-groen">Wijzigen</a>

</div>

</div>

@endsection