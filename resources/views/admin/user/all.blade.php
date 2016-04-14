@extends('layouts.skeleton')

@section('title')
    All users
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>Admin | All users</h2>
		</header>

        <div class="box 12u">
            <ul class="alt">
                @foreach($users as $key => $user)
					<li><a href="{{ route("admin.user", ['id' => $user->id])}}">{{ $user->username }} ({{ $user->email }})</a></li>
                @endforeach
            </ul>
		</div>
        <div class="row uniform align-center">
            <div class="12u">
                <ul class="actions">
                    @if($users->currentPage() != 1)
                        <li><a href="{!! $users->previousPageUrl() !!}" class="button alt icon fa-arrow-left" />Prev Page</a></li>
                    @endif
                    <li><a class="button special" />{!! $users->currentPage() !!} / {!! $users->lastPage() !!}</a></li>
                    @if($users->currentPage() != $users->lastPage())
                        <li><a href="{!! $users->nextPageUrl() !!}" class="button alt icon fa-arrow-right" />Next Page</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </section>
@endsection
