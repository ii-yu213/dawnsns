<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Post extends Model
{
    //
 public function getUserNameById()
  {
    return DB::table('posts')
    ->select('users.id','users.username','posts.id','posts.user_id','posts.posts','posts.created_at')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->get();
  }

}
