<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Follow;
use App\Post;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
      $users = DB::table('users')->get();
        return view('users.profile',['users'=>$users]);
    }


    //ユーザー一覧
    //$follownumbers = フォロワーカラムに自分のidが入っている人
    //->pulck=取得

    public function index(){
          $users = DB::table('users')->get();
          $users = User::all()->except([\Auth::id()]);
          $follownumbers = DB::table('follows')
              ->where('follower',Auth::id())
              ->pluck('follow');
        return view('users.search',['users'=>$users,'follownumbers'=>$follownumbers]);
    }


    //ユーザー検索

    public function search(Request $request){
         $search = $request->input('search');
          $sql = User::orderBy('id', 'desc');
            if (isset($search)) {
                $sql = User::where('username', 'LIKE', "%${search}%");}
        $users = $sql->get();
        $follownumbers = DB::table('follows')
            ->where('follower',Auth::id())
            ->pluck('follow');
     return view('users.search',['users'=>$users,'follownumbers'=>$follownumbers]);
}

  public function other($id){
        $users = DB::table('users')
            ->where('id',$id)->get();
        $follownumbers = DB::table('follows')
              ->where('follower',Auth::id())
              ->pluck('follow');
        $posts =DB::table('posts')
            ->where('user_id',$id)->get();


        return view('users.otherUser',['users'=>$users,'follownumbers'=>$follownumbers,'posts'=>$posts]);
    }




    public function rules(array $rules){
          $user = DB::table('users')->get();
        return Validator::make($rules,
            [
            'username' => 'required|string|between:4,12',
             'mail' => ['required','string','email','max:255',Rule::unique('users')->ignore(Auth::id())],
             'password' => ['required','string','between:4,8','alpha_num',Rule::unique('users')->ignore(Auth::id())],
             'bio' => 'string|max:200',
            ],[
             'username.required' => '必須項目です',
            'username.between' => '4～12文字で入力してください',
            'mail.required' => '必須項目です',
            'mail.email' => '形式が違います',
            'password.required' => '必須項目です',
            'password.between' => '4～8文字で入力してください',
        ]
           )->validate();
    }



    //ユーザー情報更新
    //if パスワード(icon)を変更しない場合
     public function update(Request $request){
        $rules = $request->input();
        $this->rules($rules);
        $username=$request->input('name');
        $mail = $request->input('email');
        $newpass = $request->input('newpass');
        $bio = $request->input('bio');
        $icon = $request->file('icon');

        if(isset($newpass)) {
            $pass = bcrypt($newpass);
        }else{
            $pass = Auth::user()->password;
        }

        if(isset($icon)) {
            $iconname = $icon->getClientOriginalName();
            $icon->storeAs('images',$iconname,'public');
        }else{
            $iconname = Auth::user()->images;
        }

        DB::table('users')
        ->where('id', Auth::user()->id)
        ->update([
            'username' => $username,
            'mail' => $mail,
            'password' => $pass,
            'bio' => $bio,
            'images' => $iconname,
        ]);

        return redirect('/profile');
    }



}
