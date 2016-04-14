@extends('layouts.skeleton')

@section('title')
    New article
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>Admin | Create an article</h2>
		</header>

        <div class="box 12u">
            @if($error != null)
                <p>{{ $error }}</p>
            @endif
            {!! Form::open(array('route' => 'admin.article.create', 'files' => true)) !!}
                <div class="row uniform">
					<div class="12u">
                        {!! Form::text('title', '', array('placeholder' => 'Title', 'required' => 'true')); !!}
					</div>
                </div>
                <div class="row uniform">
                    <div class="12u">
                        {!! Form::textarea('description', '', array('placeholder' => 'Description',  'rows' => "2", 'required' => 'true')); !!}
					</div>
				</div>
                <div class="row uniform">
					<div class="12u">
                        {!! Form::text('subtitle', '', array('placeholder' => 'Subtitle', 'required' => 'true')); !!}
					</div>
                </div>
                <div class="row uniform">
                    <div class="12u">
                        {!! Form::textarea('content', '', array('placeholder' => 'Content',  'rows' => "6", 'required' => 'true')); !!}
					</div>
				</div>
                <div class="row uniform">
                    <div class="12u">
                        {!! Form::file('image'); !!}
					</div>
				</div>

				<div class="row uniform">
					<div class="12u">
						<ul class="actions">
							<li>{!! Form::submit('Create') !!}</li>
							<li>{!! Form::reset('Reset', array('class' => 'alt')) !!}</li>
						</ul>
					</div>
				</div>
            {!! Form::close() !!}
		</div>

    </section>
@endsection
