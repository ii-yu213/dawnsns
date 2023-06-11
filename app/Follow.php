<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Follow extends Model
{
    //

      public function getCountByFollow(){
        return DB::table('follows')
        ->selectRaw('COUNT(follow) AS count_follow')
        ->get();
    }


    public function getCountByFollower(){
        return DB::table('follows')
        ->selectRaw('COUNT(follower) AS count_follower')
        ->get();
    }

    public function join()
    {
        return DB::table('follows')
        ->select('follows.follower','follows.follow','posts.id','posts.user_id','posts.posts','posts.created_at','users.id','users.username',)
        ->join('users','follows.follower','=','users.id')
        ->join('posts','follows.follower','=','post.user_id')
        ->get();
    }


}
