@extends('layouts.skeleton')

@section('title')
    Inscription
@endsection

@section('content')

    <!-- Main -->
    <section id="main" class="container">
		<header>
			<h2>Inscription</h2>
            <p>Inscrivez vous pour réagir au article</p>
		</header>
		<div class="box">
            @if($error != null)
                <p>{{ $error }}</p>
            @endif

            {!! Form::open(array('route' => 'doSignup', 'files' => true)) !!}
                <div class="row uniform 50%">
					<div class="6u 12u(mobilep)">
                        {!! Form::text('username', '', array('placeholder' => 'Nom d\'utilisateur', 'required' => 'true')); !!}
					</div>
                    <div class="6u 12u(mobilep)">
                        {!! Form::email('email', '', array('placeholder' => 'Email', 'required' => 'true')); !!}
					</div>
				</div>

                <div class="row uniform 50%">
                    <div class="6u 12u(mobilep)">
                        {!! Form::password('password', array('placeholder' => 'Mot de passe', 'required' => 'true')); !!}
					</div>
                    <div class="6u 12u(mobilep)">
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirmez votre mot de passe', 'required' => 'true')); !!}
					</div>
                </div>

                <div class="row uniform 50%">
                    <div class="1u 12u(mobilep)">
                        {!! Form::label('avatar', 'Avatar : '); !!}
                    </div>
                    <div class="11u 12u(mobilep)">
                        {!! Form::file('avatar'); !!}
					</div>
                </div>

				<div class="row uniform">
					<div class="12u">
						<ul class="actions">
							<li>{!! Form::submit('S\'incrire') !!}</li>
                            <li>{!! Form::reset('Réinitialiser', array('class' => 'alt')) !!}</li>
							<li><a href="{{ route('login') }}" />Page de connexion</a></li>
						</ul>
					</div>
				</div>
            {!! Form::close() !!}
		</div>
	</section>

@endsection
