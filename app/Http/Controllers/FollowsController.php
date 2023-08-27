<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Follow;
use App\Post;
use App\User;


class FollowsController extends Controller
{
    //フォローリスト
    public function followList(){
        $this->follows = new Follow();
        $follow = $this->follows->join();
        return view('follows.followList',compact('follow',));
    }

    //フォロワーリスト
    public function followerList(){

    return view('follows.followerList');
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
