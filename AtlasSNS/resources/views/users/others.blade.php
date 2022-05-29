@extends('layouts.login')

@section('content')
<div id="others">
  <div class="others-area">
    <figure class="user__icon"><img src="{{ asset('storage/'.$others->images)}}"></figure>
    <div class="others-box-label">
      <p>name</p>
      <p>bio</p>
    </div>
    <div class="others-box">
      <p class="others-name">{{$others->username}}</p>
      <p class="others-name">{{$others->bio}}</p>
    </div>
    <div class="others-btn-area">
      @if (auth()->user()->isFollowing($others->id))
      <form action="/unfollow" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$others->id}}"></input>
      <input type="submit" class="btn btn-danger others-btn" value="フォロー解除">
      </form>

      @else
      <form action="/follow" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$others->id}}"></input>
      <input type="submit" class="btn btn-primary others-btn" value="フォロー">
      </form>
      @endif
    </div>
</div>

</div>
  <div id ="tweet">
    @foreach ($tweet as $tweet)
    <div class="tweet-area">
          <figure class="user__icon"><img src="{{ asset('storage/'.$tweet->user->images)}}"></figure>
        <div class="tweet-box">
          <p class="tweet-name">{{ $tweet->user->username}}</p>
          <p class="tweet-post">{{ $tweet->post }}</p>
        </div>
        <div class="tweet-item">
          <p>{{ $tweet->updated_at }}</p>
        </div>
    </div>
    @endforeach
  </div>
@endsection
