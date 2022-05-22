<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UsersFormRequest;  //UsersFormRequestをつかうため

use App\User;  //これかかないとリレーションできない！
use App\Post;

class UsersController extends Controller
{
    //
    public function profileShow(){
        return view('users.profile');
    }


    public function profile(UsersFormRequest $request){

            $user = Auth::User();

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            $password_confirmation = $request->input('password_confirmation');
            $bio = $request->input('bio');
        //  $images = $request->input('images');  //formで設置したname名

            User::where('id', Auth::user()->id)->update(['username' => $username,'mail' => $mail,'password' => bcrypt($password),'password_confirmation' => $password_confirmation,'bio' => $bio]);

            $images = $request->file('images')->store('public');
            $user->images = basename($images);
            $user->save();

        return view('users.profile');
    }

    public function others($id){  //他の人のプロフィールにとぶよ

        $others = User::find($id);
        $tweet = Post::where('user_id',$id)->get();

        return view('users.others',['others'=>$others,'tweet'=>$tweet]);
        }


    public function search(Request $request){

        $keyword = $request->input('keyword');

        $query = User::query();

        if(!empty($keyword)){
            $users = $query->where('username','like','%'.$keyword.'%')->paginate(20);
        }else {
            $users = User::paginate(20);
            $keyword='全件表示';
        }

        return view('users.search',['users'=>$users,'keyword'=>$keyword]);


        //  if($keyword){
        //     $query = User::where('username', 'LIKE', "%$keyword%")->simplePaginate(2);}

        // $data = $query->orderBy('created_at','desc')->paginate(10);
        // return view('users.search')->with('data',$data)
        // ->with('keyword',$keyword)
        // ->with('message','ユーザーリスト');

        // return view('users.search');
    }
}
