@extends('layouts.skeleton')

@section('title')
    Me Contacter
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container 75%">
		<header>
			<h2>Me Contacter</h2>
			<p>Dit moi se que vous pensez de mon site, tout les retours sont intéressants.</p>
		</header>
		<div class="box">
            {!! Form::open(array('route' => 'doContact')) !!}
				<div class="row uniform 50%">
					<div class="6u 12u(mobilep)">
                        {!! Form::text('name', '', array('placeholder' => 'Nom', 'required' => 'true')); !!}
					</div>
					<div class="6u 12u(mobilep)">
                        @if(Auth::check())
                            {!! Form::email('email', Auth::user()->email, array('placeholder' => 'Email', 'required' => 'true')); !!}
                        @else
                            {!! Form::email('email', '', array('placeholder' => 'Email', 'required' => 'true')); !!}
                        @endif
					</div>
				</div>
				<div class="row uniform 50%">
					<div class="12u">
                        {!! Form::text('subject', '', array('placeholder' => 'Sujet', 'required' => 'true')); !!}
					</div>
				</div>
				<div class="row uniform 50%">
					<div class="12u">
                        {!! Form::textarea('content', '', array('placeholder' => 'Entrez votre message', 'rows' => "6", 'required' => 'true')); !!}
					</div>
				</div>
				<div class="row uniform">
					<div class="12u">
						<ul class="actions align-center">
							<li>{!! Form::submit('Envoyer') !!}</li>
						</ul>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</section>
@endsection
