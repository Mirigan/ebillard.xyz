@extends('layouts.skeleton')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>{{ $article->title }}</h2>
            <p>{{ $article->description }}</p>
		</header>

        <div class="box 12u 12u(mobilep)">
            @if($article->image != null)
                <span class="image featured">{{ Html::image($article->image) }}</span>
            @endif
			<h3>{{ $article->subtitle }}</h3>
			<p>{!! $article->content !!}</p>
            <blockquote>
                Posté le {{ Carbon\Carbon::createFromFormat('Y-m-d', $article->date)->toFormattedDateString() }}
                @if($article->date != $article->update && $article->update != null)
                    <br/>(Mise à jour le {{ Carbon\Carbon::createFromFormat('Y-m-d', $article->update)->toFormattedDateString() }})
                @endif
            </blockquote>
		</div>

    </section>
@endsection
