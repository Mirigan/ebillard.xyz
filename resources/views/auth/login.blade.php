@extends('layouts.skeleton')

@section('title')
    Connexion
@endsection

@section('content')

    <!-- Main -->
    <section id="main" class="container">
		<header>
			<h2>Connexion</h2>
		</header>
		<div class="box">
            @if($error != null)
                <p>{{ $error }}</p>
            @endif

            {!! Form::open(array('route' => 'doLogin')) !!}
                <div class="row uniform 50%">
					<div class="6u 12u(mobilep)">
                        {!! Form::text('username', '', array('placeholder' => 'Mon d\'utilisateur')); !!}
					</div>
					<div class="6u 12u(mobilep)">
                        {!! Form::password('password', array('placeholder' => 'Mot de passe')); !!}
					</div>
				</div>

				<div class="row uniform">
					<div class="12u">
						<ul class="actions">
							<li>{{ Form::submit('Connexion') }}</li>
                            <li><a href="{{ route('signup') }}" class="button alt" />S'inscrire</a></li>
                            <li><a href="{{ route('password.reset') }}" class="alt" />Mot de passe oublié (ne fonctionne pas encore)</a></li>
						</ul>
					</div>
				</div>
            {!! Form::close() !!}
		</div>
	</section>

@endsection
