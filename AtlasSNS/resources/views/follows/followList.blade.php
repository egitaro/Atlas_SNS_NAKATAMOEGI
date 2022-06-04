@extends('layouts.login')

@section('content')
<div class="list">
      <h3>Follow List</h3>
      <div class="list-item">
            @foreach ($list as $list)
                  <figure class="user__icon"><a href="{{$list->id}}/others"><img src="{{ asset('storage/'.$list->images)}}"></a></figure>
            @endforeach
      </div>
</div>

<div id ="tweet">
      @foreach ($post as $post)
      <div class="tweet-area">
            <figure class="user__icon"><img src="{{ asset('storage/'.$post->user->images)}}"></figure>
          <div class="tweet-box">
            <p class="tweet-name">{{ $post->user->username}}</p>
            <p class="tweet-post">{{ $post->post }}</p>
          </div>
          <div class="tweet-item">
            <p>{{ $post->created_at }}</p>
          </div>
      </div>
      @endforeach
</div>
@endsection
