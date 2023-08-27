@extends('layouts.login')

@section('content')

<h1>Follow list</h1>
  <!-- 画像の変更 -->
  <table>
@foreach($follow as $follows)
    <tr>
      <td>
       <a href="/{{ $follows->user_id }}/otherUser"><img src="{{ asset('/storage/images/' . $follows->images) }}"></a>
      </td>
    </tr>


@endforeach
</table>
<!-- フォローしている人の投稿 -->


@endsection
