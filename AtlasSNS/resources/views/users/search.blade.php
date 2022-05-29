@extends('layouts.login')

@section('content')
<!-- 検索 -->
<div id="search">
  <form action="/search" method="post">
    @csrf
    <input type="text" name="keyword" class="search-box" placeholder="ユーザー名">
    <input type="submit" value="検索">
  </form>
  <p>検索ワード:{{$keyword}}</p>
</div>

<div class="result">
    @foreach ($users as $users)
    @if ($users->id != Auth::id())  <!-- !をつけると逆の意味になる-->
          <div><figure class="user__icon"><img src="images/icon1.png"></figure></div>
          <div>{{$users->username}}</div>

          @if (auth()->user()->isFollowing($users->id))
          <form action="/unfollow" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$users->id}}"></input>
          <input type="submit" value="フォロー解除">
          </form>

          @else
          <form action="/follow" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$users->id}}"></input>
          <input type="submit" value="フォロー">
          </form>
          @endif

        @endif
    @endforeach
</div>
@endsection
