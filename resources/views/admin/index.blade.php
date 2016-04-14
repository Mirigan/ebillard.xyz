@extends('layouts.skeleton')

@section('title')
    Admin index
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>Admin | Index page</h2>
		</header>

        <div class="box 12u">
			<h3>5 Last articles</h3>
            @if(sizeof($articles) > 0 )
                <ul class="alt">
                    @foreach($articles as $key => $article)
    					<li><h4><a href="{{ route("admin.article", ['id' => $article->id]) }}">{{ $article->title }}</a></h4> {{ $article->description }}</li>
                    @endforeach
                </ul>
            @else
                <p>No article</p>
            @endif
            <div class="row uniform 50%">
                <div class="6u 12u(mobilep)">
                    <a href="{{ route('admin.article.new') }}" class="button special fit">Créer un article</a>
                </div>
                @if(sizeof($articles) > 0 )
                    <div class="6u 12u(mobilep)">
                        <a href="{{ route('admin.article.all') }}" class="button alt fit">Tout les articles</a>
                    </div>
                @endif
            </div>
		</div>
        <div class="box 12u">
			<h3>5 Last users</h3>
            @if(sizeof($users) > 0 )
                <ul class="alt">
                    @foreach($users as $key => $user)
    					<li><h4><a href="{{ route("admin.user", ['id' => $user->id]) }}">{{ $user->username }}</a></h4> ({{ $user->email }})</li>
                    @endforeach
                </ul>
            @else
                <p>No user</p>
            @endif
            <div class="row uniform 50%">
                <div class="12u">
                    <a href="{{ route("admin.user.all") }}" class="button special fit">Tout les users</a>
                </div>
            </div>
		</div>

    </section>
@endsection
