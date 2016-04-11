@extends('layouts.skeleton')

@section('title')
    Sign up
@endsection

@section('content')

    <!-- Main -->
    <section id="main" class="container">
		<header>
			<h2>Sign up</h2>
            <p>Sign up to react on the blog</p>
		</header>
		<div class="box">
            @if($error != null)
                <p>{{ $error }}</p>
            @endif

            {!! Form::open(array('route' => 'doSignup', 'files' => true)) !!}
                <div class="row uniform 50%">
					<div class="6u 12u(mobilep)">
                        {!! Form::text('username', '', array('placeholder' => 'Username', 'required' => 'true')); !!}
					</div>
                    <div class="6u 12u(mobilep)">
                        {!! Form::email('email', '', array('placeholder' => 'Email', 'required' => 'true')); !!}
					</div>
				</div>

                <div class="row uniform 50%">
                    <div class="6u 12u(mobilep)">
                        {!! Form::password('password', array('placeholder' => 'Password', 'required' => 'true')); !!}
					</div>
                    <div class="6u 12u(mobilep)">
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password', 'required' => 'true')); !!}
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
							<li>{!! Form::submit('Sign up') !!}</li>
							<li>{!! Form::reset('Reset', array('class' => 'alt')) !!}</li>
						</ul>
					</div>
				</div>
            {!! Form::close() !!}
		</div>
	</section>

@endsection
