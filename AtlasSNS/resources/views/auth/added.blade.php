@extends('layouts.logout')

@section('content')

<div class="added-cushion"></div>

<div class="welcome-area added">
    <div class="added-title">
    <p>{{session('username')}}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    </div>
    <div class="added-title">
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>
    </div>
  <h1><a href="/login" class="btn btn-danger submit">ログイン画面へ</a></h1>
</div>

@endsection
