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
		<div class="col-md-8 col-md-offset-2">
		    <div class="text-section">
		    	<h3>Over Bloembox</h3>
		    	<p>Bloembox? Een nagelnieuwe, jonge onderneming met als doel de wereld in de bloemetjes te zetten. Om jùllie in de bloemetjes te zetten, met onze totaalpakketten. 

				Origineel en mooi boeket? Check ! 

				Klassevolle verpakking die je bijna niet durft open maken? Check! 

				Zelfgeschreven kaartje waar je warm van wordt? Double check! 

				Wij zijn er alvast klaar voor! Jij ook? </p>
		    </div>
		</div>
    </div>
    <div class="row">
		<div class="col-md-8 col-md-offset-2">
		    <div class="text-section">
		    	<h3>Waarom bloembox?</h3>
		    	<p>Is het geschikte cadeau vinden ook zo moeilijk voor jou? Dwaal je vaak eindeloos door een winkelcentrum in de hoop het ideale geschenk te vinden? 

				Dat hoeft niet langer ! 

				Met Bloembox stuur je een waanzinnig boeket waar je zelf amper iets voor moet doen. Kies je pakket, vervolgens je kaartje en werk het daarna af met een liefdevolle tekst. Done ! 

				Wij gaan verder aan de slag om de bloemen te voorzien van voldoende vocht voor de reis, je kaartje uit de pers te laten rollen en dan te bundelen in onze mooie geschenkverpakking. Daarna kan Eddy, de lokale postbediende, ervoor zorgen dat alles veilig aankomt. 

				Eens de bloemen aangekomen zijn, heb je er minstens nog een weekje genot van ! </p>
		    </div>
		</div>
    </div>
</div>
@endsection
