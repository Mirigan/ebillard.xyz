@extends('layouts.skeleton')

@section('title')
    Contact Me
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container 75%">
		<header>
			<h2>Contact Me</h2>
			<p>Tell me what you think about my web site.</p>
		</header>
		<div class="box">
            {!! Form::open(array('route' => 'doContact')) !!}
				<div class="row uniform 50%">
					<div class="6u 12u(mobilep)">
                        {!! Form::text('name', '', array('placeholder' => 'Name', 'required' => 'true')); !!}
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
                        {!! Form::text('subject', '', array('placeholder' => 'Subject', 'required' => 'true')); !!}
					</div>
				</div>
				<div class="row uniform 50%">
					<div class="12u">
                        {!! Form::textarea('message', '', array('placeholder' => 'Enter your message', 'rows' => "6", 'required' => 'true')); !!}
					</div>
				</div>
				<div class="row uniform">
					<div class="12u">
						<ul class="actions align-center">
							<li><input type="submit" value="Send Message" /></li>
						</ul>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</section>
@endsection
