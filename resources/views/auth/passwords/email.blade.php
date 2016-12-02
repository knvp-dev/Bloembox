@extends('layout.layout')

@section('banner')

<div class="image-banner">
    <img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
    <div class="container">
        <div class="image-banner-body">
            <h1 class="image-banner-title">Wachtwoord vergeten</h1>
            
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="col-md-12">

    <div class="account-form-info col-md-6">
        
        <img src="{{ asset('images/products/1146.jpg') }}" alt="">

    </div>


    <form action="/password/email" class="account-form col-md-6" method="post">

    <h1>Wachtwoord opnieuw instellen</h1>

    <br>

    @if( count($errors) > 0 )
      <ul class="alert alert-danger">
          @foreach($errors->all() as $error)
          <li class="error">{{ $error }}</li>
          @endforeach
      </ul>
    @endif

      <div class="form-group col-md-12">
        <label for="email" class="sr-only">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
      </div>

      {{ csrf_field() }}

      <button type="submit" class="btn btn-default">Verstuur mij een reset link</button>

    </form>

</div>

@endsection
