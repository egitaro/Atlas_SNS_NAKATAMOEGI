@extends('layouts.login')

@section('content')

{!! Form::open(['url'=>'/profile','enctype' => 'multipart/form-data']) !!}

{{Form::token()}}

<p>{{ Form::label('username') }}
{{ Form::text('username',Auth::user()->username,['class' => 'input']) }}</p>
@if($errors->has('username'))<br><span class="error">{{ $errors->first('username') }}</span> @endif

<p>{{ Form::label('mail address') }}
{{ Form::text('mail',Auth::user()->mail,['class' => 'input']) }}</p>
@if($errors->has('mail'))<br><span class="error">{{ $errors->first('mail') }}</span> @endif

<p>{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}</p>
@if($errors->has('password'))<br><span class="error">{{ $errors->first('password') }}</span> @endif

<p>{{ Form::label('password_confirmation') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}</p>
@if($errors->has('password_confirmation'))<br><span class="error">{{ $errors->first('password_confirmation') }}</span> @endif

<p>{{ Form::label('bio') }}
{{ Form::text('bio',Auth::user()->bio,['class' => 'input']) }}</p>

<p>{{ Form::label('icon image') }}
{{ Form::file('images',null,['class' => 'input']) }}</p>

<p>{{ Form::submit('更新') }}</p>

{!! Form::close() !!}




@endsection
