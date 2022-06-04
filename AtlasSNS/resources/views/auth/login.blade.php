<div class="welcome-cushion-top"></div>

@extends('layouts.logout')

@section('content')

{!! Form::open(['url'=>'/login']) !!}
<div class="welcome-cushion-bottom"></div>

  <div class="welcome-area">
    <div class="welcome-box">
    <p class="welcome-title">AtlasSNSへようこそ</p>

      {{ Form::label('mail address',null,['class' => 'label']) }}
      {{ Form::text('mail',null,['class' => 'input']) }}
      {{ Form::label('password',null,['class' => 'label']) }}
      {{ Form::password('password',['class' => 'input']) }}

      <h1>{{ Form::submit('LOGIN',['class' => 'btn btn-danger submit']) }}</h1>

    <p><a href="/registerShow">新規ユーザーの方はこちら</a></p>
    </div>
  </div>

    {!! Form::close() !!}

@endsection
