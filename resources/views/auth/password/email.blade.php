@extends('layouts.skeleton')

@section('title')
    Réinitialiser votre mot de passe
@endsection

@section('content')

    <!-- Main -->
    <section id="main" class="container">
		<header>
			<h2>Réinitialiser votre mot de passe</h2>
            <p>/!\ NE FONCTIONNE PAS /!\</p>
		</header>
		<div class="box">
            @if($error != null)
                <p>{{ $error }}</p>
            @endif

            {!! Form::open(array('route' => 'password.reset.send')) !!}
                <div class="row uniform">
					<div class="12u">
                        {!! Form::email('email', '', array('placeholder' => 'Entrez votre adresse mail')); !!}
					</div>
				</div>

				<div class="row uniform">
					<div class="12u">
						<ul class="actions">
							<li>{{ Form::submit('Envoyer') }}</li>
                            <li><a href="{{ route('login') }}" class="button alt" />Se connecter</a></li>
                            <li><a href="{{ route('signup') }}" class="button alt" />S'inscrire</a></li>
						</ul>
					</div>
				</div>
            {!! Form::close() !!}
		</div>
	</section>

@endsection
