@extends('layouts.skeleton')

@section('title')
    Blog 
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>Les derniers articles</h2>
		</header>
        @if(sizeof($articles) > 0)
            @foreach($articles as $article)
                <div class="box 12u 12u(mobilep)">
                    @if($article->image != null)
                        <span class="image featured">{{ Html::image($article->image) }}</span>
                    @endif
        			<h3>{{ $article->title }}</h3>
                    <p>{{ $article->description }}</p>
                    <p><a href="{{ route('blog.article', ['id' => $article->id]) }}" class="button alt fit">En lire plus</a></p>
        		</div>
            @endforeach
            <div class="row uniform align-center">
                <div class="12u">
                    <ul class="actions">
                        @if($articles->currentPage() != 1)
                            <li><a href="{!! $articles->previousPageUrl() !!}" class="button alt icon fa-arrow-left" />Page prec</a></li>
                        @endif
                        <li><a class="button special" />{!! $articles->currentPage() !!} / {!! $articles->lastPage() !!}</a></li>
                        @if($articles->currentPage() != $articles->lastPage())
                            <li><a href="{!! $articles->nextPageUrl() !!}" class="button alt icon fa-arrow-right" />Page suiv</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        @else
            <div class="box 12u 12u(mobilep)">
                <h3>Pas d'article pour le moment</h3>
            </div>
        @endif

    </section>
@endsection
