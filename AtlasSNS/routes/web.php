<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログインするとき
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログインしたあと
Route::get('/top','PostsController@index');

//プロフィール
Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@profile');

//ユーザー検索
Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

//フォローリストとか
Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

// ログアウトする
Route::get('/logout','Auth\LoginController@logout');

// 投稿するやつ
Route::post('/index','PostsController@index');
Route::get('/index','PostsController@index');

//削除するやつ
Route::get('post/{id}/delete', 'PostsController@delete');

//投稿を編集するやつ
Route::post('/update', 'PostsController@update');

//フォロー機能
Route::post('/follow', 'FollowsController@follow');
Route::post('/unfollow', 'FollowsController@unfollow');
