<!DOCTYPE HTML>
<html lang="en">
    <head>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta charset="UTF-8">

        <title>Coming-Soon : {{ config('app.name') }}</title>

        <link rel="icon" href="{{ asset('img/logo/logo-small.png') }}">
    	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500">
    	<link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
    	<link rel="stylesheet" href="{{ asset('css/jquery.classycountdown.css') }}" />
    	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    	<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    </head>
    <body>
    	<div class="main-area">
    		<section class="left-section" style="background-image: url({{ asset('img/coming-soon.png') }})"></section>

    		<section class="right-section full-height">
    			<a class="logo" href="{{ route('welcome') }}">
                    <img src="{{ asset('img/logo/logo-trans.png') }}" alt="Logo">
                </a>

    			<div class="display-table">
    				<div class="display-table-cell">
    					<div class="main-content">
                            @if ($subscribe)
                                <h1 class="title"><b>Une dernière étape!</b></h1>
                                <p class="desc">
                                    Pour activer votre réduction de 50% sur tous nos produits cosmétiques au lancement du site, invite tes amis à essayer Europ'Cos. <br>

                                    <br>
                                    <a href="https://bit.ly/europcos50" class="active-btn"><b>Activer</b></a>
                                </p>
                            @else
                                <h1 class="title"><b>Le meilleur de la cosmétique livré chez vous!</b></h1>
                                <p class="desc">
                                    Bientôt nous serons en ligne. Inscrivez vous sur notre liste d'attente pour profiter de 50% de réduction sur tous nos produits au lancement!
                                </p>
        						<div class="email-input-area">
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            @foreach ($errors->all() as $error)
                                                <ul>
                                                    <li> {{ $error }} </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    @endif

                                    {{ Form::open(['url' => route('subscribe')]) }}
        								<input class="email-input" name="email" type="text" placeholder="Votre adresse email ici !"/>
        								<button class="submit-btn" name="submit" type="submit"><b>Je m'inscris</b></button>
        							{{ Form::close() }}
        						</div>
        						{{-- <p class="post-desc">Sign up now to get early notification of our lauch date!</p> --}}
                            @endif
    					</div>
    				</div>
    			</div>
    		</section>
    	</div>

    	<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    	<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    	<script src="{{ asset('js/scripts.js') }}"></script>
        @include('flashy::message')
    </body>
</html>
