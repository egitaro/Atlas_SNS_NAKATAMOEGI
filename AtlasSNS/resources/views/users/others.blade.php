@extends('layouts.login')

@section('content')

    <div id ="others">
        {{$others->username}}
        <figure class="user__icon"><img src="{{ asset('storage/'.$others->images)}}"></figure>
        {{$others->bio}}
          @if (auth()->user()->isFollowing($others->id))
          <form action="/unfollow" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$others->id}}"></input>
          <input type="submit" value="フォロー解除">
          </form>

          @else
          <form action="/follow" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$others->id}}"></input>
          <input type="submit" value="フォロー">
          </form>
          @endif

    <div id ="tweet">
      @foreach ($tweet as $tweet)
        <tr>
          <td><figure class="user__icon"><img src="images/icon1.png"></figure></td>
          <td>{{ $tweet->user->username}}</td>
          <td>{{ $tweet->post }}</td>
          <td>{{ $tweet->updated_at }}</td>
        </tr>
      @endforeach
    </div>

    </div>



@endsection
