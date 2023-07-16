@extends('layouts.login')

@section('content')
<div class ="followlist">
  <h1>Follow list</h1>
  @foreach ($follows as $follow)

  <!-- 画像の変更 -->
  <span><a href="/{{ $follow->follow }}/otherUser"><img src="images/dawn.png"></a></span>
  @endforeach
</div>

<div class="follows_posts">
<table>


<!-- フォローしている人の投稿 -->

@foreach ($posts as $post)
  <tr>
      <td><a href="/{{ $post->user_id }}/otherUser"><img src="images/dawn.png"></a></td>
      <!-- ユーザーネーム取得 -->
      <td>username</td>
      <td>{{ $post->created_at }}</td>
      <td>{{ $post->posts }}</td>
  </tr>
 @endforeach
</table>
</div>




@endsection
