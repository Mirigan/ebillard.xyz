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
                Posted the {{ Carbon\Carbon::createFromFormat('Y-m-d', $article->date)->toFormattedDateString() }}
                @if($article->date != $article->update && $article->update != null)
                    <br/>(Update the {{ Carbon\Carbon::createFromFormat('Y-m-d', $article->update)->toFormattedDateString() }})
                @endif
            </blockquote>
		</div>

        <div class="row uniform align-center">
            <div class="12u">
                {!! Form::open(array('route' => array('admin.article.delete', $article->id), 'method' => 'Delete')) !!}
                    <ul class="actions">
                        <li><a href="{{ route("admin.article.edit", ['id' => $article->id]) }}" class="button alt icon fa-pencil">Edit</a></li>
                        <li>{!! Form::submit('Delete', array('class' => 'button special')) !!}</li>
                    </ul>
                {!! Form::close() !!}
            </div>
        </div>

    </section>
@endsection
