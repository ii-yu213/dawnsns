<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use User;
use Post;
use Follow;

class FollowsController extends Controller
{

    // posts,usersの結合
    public function getUserNameById()
   {
    return DB::table('posts')
    ->select('users.id','users.username','posts.id','posts.user_id','posts.posts','posts.created_at')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->get();
   }

   //posts,followsの結合
    public function followPosts(){
    return DB::table('posts')
    ->select('follows.follower','posts.id','posts.user_id','posts.posts','posts.created_at')
    ->join('follows', 'posts.user_id', '=', 'follows.follower')
    ->get();
   }

    //users,followsの結合
    public function followUsers(){
    return DB::table('users')
    ->select('users.id','users.username','follows.follower')
    ->join('follows', 'users.id', '=', 'follows.follower')
    ->get();
    }

    //フォローリスト
    public function followList(){
        $posts = DB::table('posts')->get();
        $follows = DB::table('follows')->where('follower',Auth::user()->id)->get();
        return view('follows.followList',['posts'=>$posts,'follows'=>$follows]);
    }

    //フォロワーリスト
    public function followerList(){
        $posts = $this->followPosts()->where('follower',Auth::user()->id);
        $posts = $this->getUserNameById();
        $follows = DB::table('follows')->where('follow',Auth::user()->id)->get();
        $followUsers = $this->followUsers();
        return view('follows.followerList',['posts'=>$posts,'follows'=>$follows]);
    }

    //フォロー実装

    public function follow($id){
        $user_id =  Auth::user()->id;
        DB::table('follows')->insert([
            'follower' => $user_id,
            'follow'=> $id,
            'created_at' => now(),
    ]);
    return redirect('/search');
    }


     public function delete($id){
        $user_id = Auth::user()->id;
        DB::table('follows')
            ->where('follow', $id)
            ->where('follower', $user_id)
            ->delete();
    return redirect('/search');

    }


}
