@extends('layouts.skeleton')

@section('title')
    Account overview
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>Account overview</h2>
		</header>

        <div class="box 12u">
			<h3>Profile</h3>

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
                    <a href="{{ route("account.edit") }}" class="button alt icon fa-pencil">Edit</a>
                </div>
            </div>
		</div>
    </section>
@endsection
