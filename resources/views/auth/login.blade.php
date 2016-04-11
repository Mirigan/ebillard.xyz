@extends('layouts.skeleton')

@section('title')
    Login
@endsection

@section('content')

    <!-- Main -->
    <section id="main" class="container">
		<header>
			<h2>Login</h2>
		</header>
		<div class="box">
            @if($error != null)
                <p>{{ $error }}</p>
            @endif

            {!! Form::open(array('route' => 'doLogin')) !!}
                <div class="row uniform 50%">
					<div class="6u 12u(mobilep)">
                        {!! Form::text('username', '', array('placeholder' => 'Username')); !!}
					</div>
					<div class="6u 12u(mobilep)">
                        {!! Form::password('password', array('placeholder' => 'Password')); !!}
					</div>
				</div>

				<div class="row uniform">
					<div class="12u">
						<ul class="actions">
							<li>{{ Form::submit('Connexion') }}</li>
							<li><a href="#" class="alt" />Forgot Password</a></li>
						</ul>
					</div>
				</div>
            {!! Form::close() !!}
		</div>
	</section>

@endsection
