@extends('layouts.skeleton')

@section('title')
    Editer mon profile
@endsection

@section('content')
    <!-- Main -->
    <section id="main" class="container">

        <header>
			<h2>Editer mon profile</h2>
		</header>

        <div class="box 12u">
            @if($error != null)
                <p>{{ $error }}</p>
            @endif
            {!! Form::open(array('route' => 'account.edit', 'files' => true)) !!}
                <div class="row uniform 50%">
                    <div class="6u 12u(mobilep)">
                        <h4>Username :</h4>
                        <p>{!! Form::text('username', $user->username, array('placeholder' => 'Nom d\'utilisateur', 'required' => 'true')); !!}</p>
                    </div>
                    <div class="6u 12u(mobilep)">
                        <h4>Email :</h4>
                        <p>{!! Form::email('email', $user->email, array('placeholder' => 'Email', 'required' => 'true')); !!}</p>
                    </div>
                </div>
                <div class="row uniform 50%">
                    <div class="6u 12u(mobilep)">
                        <h4>New Password :</h4>
                    </div>
                </div>

                <div class="row uniform 50%">
                    <div class="6u 12u(mobilep)">
                        {!! Form::password('password', array('placeholder' => 'Nouveau mot de passe')); !!}
					</div>
                    <div class="6u 12u(mobilep)">
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirmez votre mot de passe')); !!}
					</div>
                </div>
                <div class="row uniform">
                    <div class="12u">
                        <div class="row">
                            <div class="2u 12u(mobilep)">
                                <h4>Avatar :</h4>
                            </div>
                            @if($user->avatar != 'avatars/default.jpg')
                                <div class="10u 12u(mobilep)">
                                    <p>
                                        {!! Form::checkbox('deleteAvatar', 'yes', false,  array('id' => 'deleteAvatar')); !!}
                                        {!! Form::label('deleteAvatar', 'Avatar par défault'); !!}
                                    </p>
                                </div>
                            @endif
                        </div>
                        {{ Html::image($user->avatar, 'avatar', array('class' => 'image avatar')) }}
                        <p>{!! Form::file('avatar'); !!}</p>
                    </div>
                </div>
                <div class="row uniform align-center">
                    <div class="12u">
                        {!! Form::submit('Enregistrer', array('class' => 'alt')) !!}
                    </div>
                </div>
            {!! Form::close() !!}
		</div>
    </section>
@endsection
