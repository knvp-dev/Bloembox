@extends('layout.layout')

@section('banner')

<div class="image-banner">
    <img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
    <div class="container">
        <div class="image-banner-body">
            <h1 class="image-banner-title">Account aanmaken</h1>
            
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="col-md-12">

    <div class="account-form-info col-md-6">
        
        <img src="{{ asset('images/products/brecht.png') }}" alt="">

    </div>


    <form action="/account/create" class="account-form col-md-6" method="post">

    <h1>Registreer je nu</h1>

    <br>

    @if( count($errors) > 0 )
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <br>
        
      <div class="form-group col-md-12">
        <label for="lastname" class="sr-only">Naam</label>
        <input type="text" class="form-control" name="lastname" placeholder="Naam" required value="{{ old('lastname')}}">
      </div>

      <div class="form-group col-md-12">
        <label for="firstname" class="sr-only">Voornaam</label>
        <input type="text" class="form-control" name="firstname" placeholder="Voornaam" required value="{{ old('firstname')}}">
      </div>

      <div class="form-group col-md-12">
        <label for="email" class="sr-only">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email')}}">
      </div>

      <div class="form-group col-md-12">
        <label for="password" class="sr-only">Wachtwoord</label>
        <input type="password" class="form-control" name="password" placeholder="Wachtwoord" required>
      </div>

      <div class="form-group col-md-12">
        <label for="password_confirmation" class="sr-only">Wachtwoord herhalen</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Wachtwoord herhalen" required>
      </div>

      <p>Heeft u een bedrijf?</p>

        <div class="form-group col-md-12">
        <label for="company-name" class="sr-only">Bedrijfsnaam</label>
        <input type="text" class="form-control" name="company-name" placeholder="Bedrijfsnaam" value="{{ old('company')}}">
      </div>

      <div class="form-group col-md-12">
        <label for="VAT" class="sr-only">Ondernemingsnummer</label>
        <input type="text" class="form-control" name="VAT" placeholder="Ondernemingsnummer"  value="{{ old('VAT')}}">
      </div>

      {{ csrf_field() }}

      <button type="submit" class="btn btn-default">Registreer</button>

    </form>

</div>

@endsection