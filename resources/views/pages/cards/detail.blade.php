@extends('layout.layout')

@section('banner')

<div class="image-banner">
	<img class="image-banner-image" src="{{ asset('images/banner/home.jpg') }}" alt="image banner image">
	<div class="container">
		<div class="image-banner-body">
			<h1 class="image-banner-title">Voeg een boodschap toe aan het kaartje</h1>
		</div>
	</div>
</div>

@endsection

@section('content')

<div class="col-md-12">

    <div class="col-md-6">
        
        <img class="is-medium-image" src="/images/cards/{{ $card->image }}.jpg" alt="">

    </div>


    <form action="/card/details/save" class="card-detail-form col-md-6" method="post">

    <h1>Voeg een boodschap toe</h1>

    <br>

      <div class="form-group col-md-12">
        <label for="message" class="sr-only">Boodschap</label>
        <textarea type="text" class="form-control" name="message" placeholder="Boodschap" required >{{ $cart_item->options->message }}</textarea>
      </div>

      <input type="hidden" name="flowers_row_id" value="{{ $cart_item->rowId }}">
      <input type="hidden" name="card_id" value="{{ $card->id }}">

      {{ csrf_field() }}

      <button type="submit" class="btn btn-default">Bevestigen</button>

    </form>

</div>

@endsection