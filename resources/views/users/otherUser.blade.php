
@extends('layouts.login')
@section('content')

<div class="profile">
@foreach ($users as $user)

<p class="icon"><img src="{{ asset('/storage/images/' . $user->images) }}"></p>

<p class="name">Name</p>
<p class="name"><?php "{{ $user->id }}" ?>{{ $user->username }}さん</p>
<br>
<p class="bio">Bio</p>
<p class="bio"><?php "{{ $user->bio }}" ?>{{ $user->bio}}</p>

@if(!$follownumbers->contains($user->id))

<p class="follow-btn"><button class="follow"><a href="/{{ $user->id }}/follow">フォローする</a></button></p>

@else

<p class="follow-btn"><button class="follow"><a href="/{{ $user->id }}/unfollow">フォローを外す</a></button></p>
@endif

 @endforeach
</div>

<div class="timelines">

@foreach ($posts as $post)
<table>
  <tr>
    <td><a href="/{{ $post->user_id }}/otherUser"><img src="{{ asset('/storage/images/' . $user->images) }}"></a></td>
    <td>{{ $user->username }}</td>
    <td>{{ $post->created_at }}</td>
    <td>{{ $post->posts }}</td>
  </tr>
</table>
@endforeach

</div>



@endsection
