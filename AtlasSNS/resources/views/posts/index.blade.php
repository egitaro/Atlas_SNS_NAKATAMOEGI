@extends('layouts.login')

@section('content')

{!! Form::open(['url'=>'/index']) !!}

    <div class="error">
      @if($errors->has('post'))<br><span class="error">{{ $errors->first('post') }}</span> @endif
      @if($errors->has('update'))<br><span class="error">{{ $errors->first('update') }}</span> @endif
    </div>

    <div id ="post">
      <figure class ="user__icon"><img src="{{ asset('storage/'.auth()->user()->images)}}"></figure>
        {{ Form::input('text','post',null,['class' => 'input', 'placeholder' => '投稿内容を入力して下さい。']) }}
        <button type="submit" class="post__icon"><img src="images/post.png"></button>
    </div>
{!! Form::close() !!}

    <div id ="tweet">
      @foreach ($tweet as $tweet)
      <div class="tweet-area">
        <figure class="user__icon"><img src="{{ asset('storage/'.$tweet->user->images)}}"></figure>
          <div class="tweet-box">
            <p class="tweet-name">{{ $tweet->user->username}}</p>
            <p class="tweet-post">{{ $tweet->post }}</p>
          </div>
          <div class="tweet-item">
            <p>{{ $tweet->created_at }}</p>
            <div class="tweet-item-icon">
              @if ($tweet->user_id === Auth::id())
              <a class="update__icon js-modal-open" post="{{$tweet->post}}" id="{{$tweet->id}}" href="/post/{{$tweet->id}}/update-form"><img src="images/edit.png"></a>

              <a class="update__icon" href="/post/{{$tweet->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash.png"></a>
              @endif
            </div>
          </div>
      </div>
      @endforeach
    </div>

    <div class="content">
    </div>
    <!-- ここからモーダル -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>

        <div class="modal__content">
          <form action="/update" method="post">
            @csrf
            <input type="hidden" name="id" class="retweet-id" value="">
            <input type="text" name="update" class="retweet" value="">
            <button type="submit" class="update__icon modal__icon" ><img src="images/edit.png"></button>
          </form>
        </div><!--modal__inner-->
    </div><!--modal-->

@endsection
