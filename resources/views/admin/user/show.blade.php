@extends('layouts.skeleton')

@section('title')
    {{ $user->username }}'s profile
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>Admin | {{ $user->username }}'s profile</h2>
            @if($user->admin)
                <p>(Admin)</p>
            @else
                <p>(Peon)</p>
            @endif
		</header>

        <div class="box 12u">


            <div class="row uniform 50%">
                <div class="6u 12u(mobilep)">
                    <h4>Username :</h4>
                    <p>{{ $user->username }}</p>
                </div>
                <div class="6u 12u(mobilep)">
                    <h4>Email :</h4>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
            <div class="row uniform">
                <div class="12u">
                    <h4>Avatar :</h4>
                    {{ Html::image($user->avatar, 'avatar', array('class' => 'image avatar')) }}
                </div>
            </div>
            <div class="row uniform align-center">
                <div class="12u">
                    {!! Form::open(array('route' => array('admin.user.delete', $user->id), 'method' => 'Delete')) !!}
                        <ul class="actions">
                            <li><a href="{{ route("admin.user.edit", ['id' => $user->id]) }}" class="button alt icon fa-pencil">Edit</a></li>
                            <li>{!! Form::submit('Delete', array('class' => 'button special')) !!}</li>
                        </ul>
                    {!! Form::close() !!}
                </div>
            </div>
		</div>
    </section>
@endsection
