@extends('layouts.login')

@section('content')

{!! Form::open(['url'=>'/profile','enctype' => 'multipart/form-data']) !!}

{{Form::token()}}

{{ Form::hidden('id',Auth::user()->id) }}

<div class="profile-area">

  <div class="profile-box-icon">
    <figure class="user__icon"><img src="{{ asset('storage/'.auth()->user()->images)}}"></figure>
  </div>

  <div class="profile-box">

    <div class="profile-item">
      <p class="profile-label">{{ Form::label('username') }}</p>
      <p>{{ Form::text('username',Auth::user()->username,['class' => 'profile-input']) }}</p>
      @if($errors->has('username'))<br><span class="error">{{ $errors->first('username') }}</span> @endif
    </div>

    <div class="profile-item">
      <p class="profile-label">{{ Form::label('mail address') }}</p>
      <p>{{ Form::text('mail',Auth::user()->mail,['class' => 'profile-input']) }}</p>
      @if($errors->has('mail'))<br><span class="error">{{ $errors->first('mail') }}</span> @endif
    </div>

    <div class="profile-item">
      <p class="profile-label">{{ Form::label('password') }}</p>
      <p>{{ Form::password('password',['class' => 'profile-input']) }}</p>
      @if($errors->has('password'))<br><span class="error">{{ $errors->first('password') }}</span> @endif
    </div>

    <div class="profile-item">
      <p class="profile-label">{{ Form::label('password_confirmation') }}</p>
      <p>{{ Form::password('password_confirmation',['class' => 'profile-input']) }}</p>
      @if($errors->has('password_confirmation'))<br><span class="error">{{ $errors->first('password_confirmation') }}</span> @endif
    </div>

    <div class="profile-item">
      <p class="profile-label">{{ Form::label('bio') }}</p>
      <p>{{ Form::text('bio',Auth::user()->bio,['class' => 'profile-input']) }}</p>
    </div>

    <div class="profile-item">
      <p class="profile-label">{{ Form::label('icon image') }}</p>
      <p class="profile-file">{{ Form::file('images',null,['class' => 'profile-input']) }}</p>
    </div>

    <p class="profile-submit-area">{{Form::submit('更新', ['class'=>'btn btn-danger profile-submit'])}}</p>

  </div>

</div>

{!! Form::close() !!}




@endsection
