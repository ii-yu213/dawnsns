@extends('layouts.login')

@section('content')
<div class ="followlist">
  <h1>Follower list</h1>

  @foreach ($follows as $follow)
  <!-- 画像変更 -->
  <span><a href="/{{ $follow->follower }}/otherUser"><img src="images/dawn.png"></a></span>
@endforeach
</div>


<div class="follower_posts">

  <!-- フォロワーの投稿に変更 -->

<table>
@foreach ($posts as $post )
    <tr>
      <td><a href="/{{ $post->user_id }}/otherUser"><img src="images/dawn.png"></a></td>
      <td>{{ $post->username}}</td>
      <td>{{ $post->created_at }}</td>
      <td>{{ $post->posts }}</td>
    </tr>

@endforeach
  </table>
</div>

@endsection
