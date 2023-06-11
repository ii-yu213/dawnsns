@extends('layouts.logout')
<div class="main">
@section('content')

{!! Form::open() !!}


<h2>新規ユーザー登録</h2>

{{ Form::label('UserName') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('Password') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('Password confirm') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

{{ Form::submit('REGSTER') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>


{!! Form::close() !!}


@endsection
