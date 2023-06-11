@extends('layouts.login')

@section('content')
<div class ="followlist">
  <h1>Follower list</h1>

  @foreach ($follows as $follow)
  <span><a href="/{{ $follow->follower }}/otherUser"><img src="images/dawn.png"></a></span>
@endforeach
</div>


<div class="follower_posts">

  <!-- 自分をフォローしている人の情報に変更 -->

<table>
@foreach ($posts as $post )
    <tr>
      <td><a href="/{{ $post->user_id }}/otherUser"><img src="images/dawn.png"></a></td>
       <!-- ユーザーネーム取得 -->
      <td>{{ $post->username}}</td>
      <td>{{ $post->created_at }}</td>
      <td>{{ $post->posts }}</td>
    </tr>

@endforeach
  </table>
</div>

@endsection
