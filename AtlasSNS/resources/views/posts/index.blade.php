  @extends('layouts.login')

@section('content')

{!! Form::open(['url'=>'/index']) !!}

    <div id ="post">
      <figure class ="user__icon"><img src="images/icon1.png"></figure>
        {{ Form::input('text','post',null,['class' => 'input', 'placeholder' => '投稿内容を入力して下さい。']) }}
        <button type="submit" class="post__icon"><img src="images/post.png"></button>
    </div>
{!! Form::close() !!}

    <div id ="tweet">
      @foreach ($tweet as $tweet)
        <tr>
          <td><figure class="user__icon"><img src="{{ asset('storage/'.$tweet->user->images)}}"></figure></td>
          <td>{{ $tweet->user->username}}</td>
          <td>{{ $tweet->post }}</td>

          @if ($tweet->user_id === Auth::id())
          <td><a class="tweet__icon js-modal-open" post="{{$tweet->post}}" id="{{$tweet->id}}" href="/post/{{$tweet->id}}/update-form"><img src="images/edit.png"></a></td>

          <td><a class="tweet__icon" href="/post/{{$tweet->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash.png"></a></td>
          @endif
        </tr>

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
            <button type="submit" class="tweet__icon" ><img src="images/edit.png"></button>
          </form>
        </div><!--modal__inner-->
    </div><!--modal-->

@endsection
