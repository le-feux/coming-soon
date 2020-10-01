@extends('beautymail::templates.minty')

@section('faq')
    <a href="#">Frequently Asked Questions</a>
@endsection
@section('support')
    <a href="#">Customer Support team</a>
@endsection
@section('unsubscribe')
    here
    {{-- <a href="#">here</a> --}}
@endsection

@section('content')
	@include('beautymail::templates.minty.contentStart')
		<tr>
			<td width="100%" height="10"></td>
		</tr>
		<tr>
			<td class="paragraph" style="text-align:justify">
                Bienvenu dans la grande famille Europ'Cos. Les meilleurs produits cosmétiques fais en france et livrés chez vous pour une bouchée de pain ! <br>
                Invitez vos amis à nous rejoindre et bénéficiez d'avantages de promos spéciales pour le lancement ici : <a href="https://bit.ly/europcos50">https://bit.ly/europcos50</a>
            </td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
		<tr>
			<td>
                Cordialement,<br>
                <b>Europ</b>Cos
			</td>
		</tr>
		<tr>
			<td width="100%" height="25"></td>
		</tr>
	@include('beautymail::templates.minty.contentEnd')
@stop
