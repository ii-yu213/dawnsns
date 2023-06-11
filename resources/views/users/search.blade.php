

@extends('layouts.login')




@section('content')
<div id="search">
        <form action="/search" method="post">
            <input type="text" name="search" placeholder="ユーザー検索">
@csrf
            <button id="sbtn" type="submit">検索<i class="fas fa-search"></i></button>
        </form>
</div>

<table class="table table-hover">

@foreach ($users as $user)
    <tr>
        <td><button><a href="/{{ $user->id }}/otherUser"><img src="/images/dawn.png"></a></button></td>
        <td>{{ $user->username }}</td>
@if(!$follownumbers->contains($user->id))
        <td><button class="follow"><a href="/{{ $user->id }}/follow">フォローする</a></button></td>
@else
        <td><button class="follow"><a href="/{{ $user->id }}/unfollow">フォローを外す</a></button></td>
@endif
    </tr>
@endforeach
  </table>
@endsection
