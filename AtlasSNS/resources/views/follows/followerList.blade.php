@extends('layouts.login')

@section('content')
<div class="list">
      @foreach ($list as $list)
            <figure class="user__icon"><a href="/profile"><img src="images/icon1.png"></figure></a>
            <div>{{$list->username}}</div>
      @endforeach
</div>

<div class="post">
@foreach ($post as $post)
      <div>{{$post->post}}</div>
@endforeach
</div>
@endsection
