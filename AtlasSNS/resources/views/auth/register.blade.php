@extends('layouts.logout')

@section('content')

{!! Form::open(['url'=>'/register']) !!}

{{Form::token()}}

<div class="welcome-area">
  <div class="welcome-box">

    <p class="register-title">新規ユーザー登録</p>

    {{ Form::label('user name',null,['class' => 'label']) }}
    {{ Form::text('username',null,['class' => 'input']) }}
    @if($errors->has('username'))<br><span class="error">{{ $errors->first('username') }}</span> @endif

    {{ Form::label('mail address',null,['class' => 'label']) }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    @if($errors->has('mail'))<br><span class="error">{{ $errors->first('mail') }}</span> @endif

    {{ Form::label('password',null,['class' => 'label']) }}
    {{ Form::text('password',null,['class' => 'input']) }}
    @if($errors->has('password'))<br><span class="error">{{ $errors->first('password') }}</span> @endif

    {{ Form::label('password confirm',null,['class' => 'label']) }}
    {{ Form::text('password_confirmation',null,['class' => 'input']) }}

    <h1>{{ Form::submit('REGISTER',['class' => 'btn btn-danger submit']) }}</h1>

    <p><a href="/login">ログイン画面へ戻る</a></p>
  </div>
</div>

{!! Form::close() !!}


@endsection
