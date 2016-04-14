@extends('layouts.skeleton')

@section('title')
    All articles
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>Admin | All articles</h2>
		</header>

        @if(sizeof($articles) > 0)
            <div class="box 12u">
                <ul class="alt">
                    @foreach($articles as $key => $article)
    					<li><h4><a href="{{ route("admin.article", ['id' => $article->id]) }}">{{ $article->title }}</a></h4> {{ $article->description }}</li>
                    @endforeach
                </ul>
    		</div>
            <div class="row uniform align-center">
                <div class="12u">
                    <ul class="actions">
                        @if($articles->currentPage() != 1)
                            <li><a href="{!! $articles->previousPageUrl() !!}" class="button alt icon fa-arrow-left" />Prev Page</a></li>
                        @endif
                        <li><a class="button special" />{!! $articles->currentPage() !!} / {!! $articles->lastPage() !!}</a></li>
                        @if($articles->currentPage() != $articles->lastPage())
                            <li><a href="{!! $articles->nextPageUrl() !!}" class="button alt icon fa-arrow-right" />Next Page</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        @else
            <div class="box 12u 12u(mobilep)">
                <h3>No article for the moment</h3>
            </div>
        @endif
    </section>
@endsection
