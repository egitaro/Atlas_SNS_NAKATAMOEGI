<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //追記
    public function post()
    {
        return $this->hasMany('App\Post');
    }

    //多対多リレーション  多対多のテーブルになるので、両方ともbelongsToManyで取得する。
    // フォローされているユーザー取得
    public function followUsers()
    {
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }
    // フォローしているユーザーを取得
    public function follows()
    {
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }

    // 第一引数には使用するモデル
    // 第二引数には使用するテーブル名
    // 第三引数にはリレーションを定義しているモデルの外部キー名
    // 第四引数には結合するモデルの外部キー名


      // フォローしているか
    public function isFollowing(Int $id)
    {
        return (boolean) $this->follows()->where('followed_id', $id)->exists();  //レコードが存在するかどうかを確認するexists!
    }

    // フォローされているか
    public function isFollowed(Int $id)
    {
        return (boolean) $this->followers()->where('following_id', $id)->exists();
    }

    //フォローしている
    public function getFollowCount($user_id)
    {
    return $this->follows()->where('following_id', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
    return $this->followUsers()->where('followed_id', $user_id)->count();
    }

}
