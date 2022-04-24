<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;  //これかかないとリレーションできない！

class UsersController extends Controller
{
    //
    public function profile(Request $request){
        if($request->isMethod('post')){

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            $bio = $request->input('bio');
            $img = $request->input('img');  //formで設置したname名

            dd($img);

        User::where('id', Auth::user()->id)->update(['username' => $username,'mail' => $mail,'password' => $password,'bio' => $bio]);

        return view('users.profile');
        }
        return view('users.profile');
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
