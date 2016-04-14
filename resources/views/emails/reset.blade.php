@extends('emails.skeleton')

<h1>Réinitialisé votre mot de passe</h1>

<h3>Cliquez ici : <a href="{{ url('password/reset', $user->remember_token).'?email='.$user->email }}"></a></h3>
