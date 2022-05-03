@extends('layouts.login')

@section('content')

{!! Form::open(['url'=>'/profile','enctype' => 'multipart/form-data']) !!}

{{Form::token()}}

<p>{{ Form::label('username') }}
{{ Form::text('username',Auth::user()->username,['class' => 'input']) }}</p>

<p>{{ Form::label('mail address') }}
{{ Form::text('mail',Auth::user()->mail,['class' => 'input']) }}</p>

<p>{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}</p>

<p>{{ Form::label('password confirm') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}</p>

<p>{{ Form::label('bio') }}
{{ Form::text('bio',Auth::user()->bio,['class' => 'input']) }}</p>

<p>{{ Form::label('icon image') }}
{{ Form::file('images',null,['class' => 'input']) }}</p>

<p>{{ Form::submit('更新') }}</p>

{!! Form::close() !!}




@endsection
