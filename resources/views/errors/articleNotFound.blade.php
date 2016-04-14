@extends('layouts.skeleton')

@section('title')
    Article introuvable
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>Ce n'est pas l'article que vous recherchez</h2>
            <p>Error 404</p>
		</header>

        <div class="box 12u 12u(mobilep)">
            <span class="image featured">{{ Html::image('images/errors/starwars.png') }}</span>
            {{-- <h3>This not the article you are looking for!</h3> --}}
			{{-- <h3>Ce n'est pas l'article que vous recherchez</h3> --}}
            <p><a href="{{ route("index") }}" class="button alt fit">Back home</a></p>
		</div>

    </section>
@endsection
