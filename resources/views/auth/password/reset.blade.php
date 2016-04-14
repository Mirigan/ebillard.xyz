@extends('layouts.skeleton')

@section('title')
    Réinitialiser votre mot de passe
@endsection

@section('content')

    <!-- Main -->
    <section id="main" class="container">
		<header>
			<h2>Réinitialiser votre mot de passe</h2>
		</header>
		<div class="box">
            @if($error != null)
                <p>{{ $error }}</p>
            @endif

            {!! Form::open(array('route' => 'password.reset.do')) !!}
                {!! Form::iden('user_id', $user->id) !!}
                <div class="row uniform 50%">
                    <div class="6u 12u(mobilep)">
                        {!! Form::password('password', array('placeholder' => 'Nouveau mot de passe', 'required' => 'true')); !!}
                    </div>
                    <div class="6u 12u(mobilep)">
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirmez votre mot de passe', 'required' => 'true')); !!}
                    </div>
                </div>

				<div class="row uniform">
					<div class="12u">
						<ul class="actions">
							<li>{{ Form::submit('Enregistrer') }}</li>
						</ul>
					</div>
				</div>
            {!! Form::close() !!}
		</div>
	</section>

@endsection
