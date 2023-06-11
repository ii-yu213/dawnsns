@extends('layouts.login')

@section('content')


  {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '今何してる？']) !!}
<button type="submit" class="sub-btn"><img src="images/post.png"></button>

        </div>
        {!! Form::close() !!}

        <table class="table table-hover">


  @foreach ($posts as $post)
            <tr>
              <td><a href="/{{ $post->user_id }}/otherUser"><img src="images/dawn.png"></a></td>
                <td>{{ $post->username }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->posts }}</td>
                <td>
                  <div class="edit-modal" id="{{ $post->id }}">
                    <form action="{{ $post->id }}/update-form" method="post">
                      @csrf
                      @method('put')
                      <input type="text" name="edit" value="{{ $post->posts }}">
                      <input type="image" src="images/edit.png">
                    </form>
                  </div>
                   <button type="edit" class="modal-open" data-target="{{ $post->id }}" id="js-close"><img src="images/edit.png"></img></td>

                <td><button type="delete" class="dele-btn"><a href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png"></a></button></td>
            </tr>
            @endforeach
  </table>
<script></script>
@endsection
