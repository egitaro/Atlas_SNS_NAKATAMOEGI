<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;  //追記

use App\Http\Requests\PostsFormRequest;  //PostsFormRequestをつかうため

use App\Post;  //これかかないとリレーションできない！
use App\Follow;

class PostsController extends Controller
{

    public function index(PostsFormRequest $request){
         if($request->isMethod('post')){    //post送信できた

            $post = $request->input('post');
            $user_id = Auth::id();

            Post::create([
                'user_id' => $user_id,
                'post' => $post,
            ]);

            return redirect('index');
        }
        $tweet = Post::whereIn('user_id',Auth::user()->follows()->pluck('followed_id'))->orWhere('user_id', Auth::id())->get();  //条件追加するときはorWhere
        return view('posts.index',['tweet'=>$tweet]);  //get送信できた(post送信して戻ってきたとき)
    }

    public function delete($id)   //投稿の削除機能
    {
        Post::where('id', $id)->delete();

        return redirect('index');
    }

    // public function updateForm($id)   //投稿の編集機能 こっちいらないかも
    // {
    //     $post = \DB::table('Posts')
    //         ->where('id', $id)
    //         ->first();
    //     return view('posts.index', compact('post'));
    // }

    public function update(PostsFormRequest $request)   //投稿の編集機能 更新
    {
        $id = $request->input('id');
        $retweet = $request->input('update');

        Post::where('id', $id)->update(['post' => $retweet]);

        return redirect('index');
    }

}
