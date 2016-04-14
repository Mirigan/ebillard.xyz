@extends('emails.skeleton')

<h1>Mail de {!! $name !!}</h1>
<p>Adresse mail : {!! $email !!}</p>

<h3>Contenue :</h3>
<p>{!! $content !!}</p>
