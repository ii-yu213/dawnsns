<?php

$errors = [];
session_start();
// 最初の訪問、もしくはindex.phpからログアウトの操作で来た時にセッション記録を破棄する
unset($_SESSION["mail"], $_SESSION["password"]);

if (isset($_POST['submit'])) {

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    if ($mail !== '' && $password !== '') {
        $_SESSION['mail'] = $mail;
        $_SESSION['pass'] = $password;
        header('Location: /top');
    } else {
        if ($mail === '') {
            $errors['mail'] = 'メールアドレスが入力されていません。';
        }
        if ($password === '') {
            $errors['password'] = 'パスワードが入力されていません。';
        }
    }
}
?>




@extends('layouts.logout')
<div class="main">
@section('content')



{!! Form::open() !!}

<p>DAWNSNSへようこそ</p>

{{ Form::label('e-mail') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
