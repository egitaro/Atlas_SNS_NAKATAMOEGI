<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Follow;
use App\User;
use App\Post;
use Auth;

class FollowsController extends Controller
{
    //フォローリスト,フォロワーリスト表示
    public function followList(){
        $list=User::whereIn('id',Auth::user()->follows()->pluck('followed_id'))->get();
        $post=Post::whereIn('user_id',Auth::user()->follows()->pluck('followed_id'))->get()->sortByDesc('created_at');

        return view('follows.followList',['list'=>$list,'post'=>$post]);
    }

    public function followerList(){
        $list=User::whereIn('id',Auth::user()->followUsers()->pluck('following_id'))->get();
        $post=Post::whereIn('user_id',Auth::user()->followUsers()->pluck('following_id'))->get()->sortByDesc('created_at');
        return view('follows.followerList',['list'=>$list,'post'=>$post]);
    }



    public function follow(Request $request) {  //フォロー機能
        $id= $request->input('id');
        Follow::create([
            'following_id' => \Auth::user()->id,
            'followed_id' => $id,
        ]);

        return back();  //return redirect('/search'); も同じ！
    }

    public function unfollow(Request $request)   //フォロー外す機能　投稿の削除機能からもってきた
    {
        $id= $request->input('id');

        $follow = Follow::where('following_id', \Auth::user()->id)->where('followed_id', $id)->delete();

        // $id= $request->input('id');
        // Follow::where('followed_id', $id)->delete();

        return back();
    }

}
