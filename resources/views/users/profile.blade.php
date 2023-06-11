@extends('layouts.login')

@section('content')

<form action="/profile" method='post' enctype="multipart/form-data">
    @csrf
  <dl>
     <dt>UserName</dt>
    <dd><input type="text" name="name" value="<?php $user = Auth::user(); ?>{{ $user->username }}"></dd>
     <dt>MailAdress</dt>
    <dd><input type="text" name="email" value="<?php $user = Auth::user(); ?>{{ $user->mail }}"></dd>
     <dt>Password</dt>
    <dd><input type="password" name="pass" value="<?php $user = Auth::user(); ?>{{ $user->password }}"></dd>
     <dt>new Password</dt>
    <dd><input type="password" name="newpass"></dd>
     <dt>Bio</dt>
    <dd><input type="text" name="bio" value="<?php $user = Auth::user(); ?>{{ $user->bio }}"></dd>
     <dt>Icon Image</dt>
    <dd><input type="file" name="icon"></dd>
  </dl>
  <div><input type="submit" value="更新"></div>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</form>

@endsection
