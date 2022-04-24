<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post', 'user_id',
    ];

    //追記
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
