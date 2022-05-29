@extends('layouts.login')

@section('content')
<!-- 検索 -->
<div id="search">
  <form action="/search" method="post">
    @csrf
    <input type="text" name="keyword" class="search-box" placeholder="ユーザー名">
    <button type="submit" class="fa-solid fa-magnifying-glass btn btn-primary search-icon"></button>
  </form>
  <p>検索ワード:{{$keyword}}</p>
</div>

<div id="result">
  @foreach ($users as $users)
    <div class="result-box">
      @if ($users->id != Auth::id())  <!-- !をつけると逆の意味になる-->
        <figure class="user__icon"><img src="{{ asset('storage/'.$users->images)}}"></figure>
        <p>{{$users->username}}</p>

      @if (auth()->user()->isFollowing($users->id))
        <form action="/unfollow" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$users->id}}">
        <input type="submit" class="btn btn-danger others-btn" value="フォロー解除">
        </form>
      @else
        <form action="/follow" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$users->id}}">
        <input type="submit" class="btn btn-primary others-btn" value="フォロー">
        </form>
      @endif
      @endif
    </div>
  @endforeach
</div>
@endsection
