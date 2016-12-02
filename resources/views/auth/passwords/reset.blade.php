@extends('layout.layout')

@section('banner')

<div class="image-banner">
    <img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
    <div class="container">
        <div class="image-banner-body">
            <h1 class="image-banner-title">Nieuw wachtwoord</h1>
            
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="col-md-12">

    <div class="account-form-info col-md-6">
        
        <img src="{{ asset('images/products/1146.jpg') }}" alt="">

    </div>

    

    <form action="/password/reset" class="account-form col-md-6" method="post">

    <h1>Wachtwoord opnieuw instellen</h1>

    <br>

    @if( count($errors) > 0 )
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group col-md-12">
        <label for="email" class="sr-only">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
      </div>

      <div class="form-group col-md-12">
        <label for="password" class="sr-only">Wachtwoord</label>
        <input type="password" class="form-control" name="password" placeholder="Wachtwoord" required>
      </div>

      <div class="form-group col-md-12">
        <label for="password_confirmation" class="sr-only">Wachtwoord herhalen</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Wachtwoord herhalen" required>
      </div>

      {{ csrf_field() }}

      <button type="submit" class="btn btn-default">Opnieuw instellen</button>

    </form>

</div>

@endsection

