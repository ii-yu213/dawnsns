<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Follow;
use App\Post;
use App\User;


class PostsController extends Controller
{
    //
    public function index()
    {
        $this->posts = new Post();
        $this->follows = new Follow();
        $users = DB::table('users')->get();
        $posts = DB::table('posts')->get();
        $follows = DB::table('follows')->get();
        $posts = $this->posts->getUserNameById();
        $follow = $this->follows->getCountByFollow();
        $follower = $this->follows->getCountByFollower();
        return view('posts.index',['posts'=>$posts]);
    }


 public function __construct()
    {
        $this->middleware('auth');
    }

public function logout(){
    Auth::logout();
    return redirect('/login');
}


//新規投稿
public function create(Request $request){
    $user_id =  Auth::user()->id;
    $post = $request->input('newPost');
    DB::table('posts')->insert([
        'user_id' => $user_id,
        'posts'=> $post,
        'created_at' => now(),
    ]);
    return redirect('/top');
}

//投稿削除
   public function delete($id){
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }


//投稿更新
    public function update(Request $request,$id){
        $edittweet = $request->input('edit');
        DB::table('posts')
        ->where('id',$id)
        ->update([
            'posts' => $edittweet,
            'updated_at' => now(),
        ]);
        return redirect('/top');
    }



}
