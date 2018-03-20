<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
// CRUD
// タスクリストの個別詳細ページ表示
Route::get('tasklists/{id}', 'TasklistsController@show');
// タスクリストの新規登録を処理（新規登録画面を表示するためのものではない）
Route::post('tasklists', 'TasklistsController@store');
// タスクリストの更新処理（編集画面を表示するためのものではない）
Route::put('tasklists/{id}', 'TasklistsController@update');
// タスクリストを削除
Route::delete('tasklists/{id}', 'TasklistsController@destroy');

// index: showの補助ページ
Route::get('tasklists', 'TasklistsController@index');

// create: 新規作成用のフォームページ
Route::get('tasklists/create', 'TasklistsController@create');

// edit: 更新用のフォームページ
Route::get('tasklists/{id}/edit', 'TasklistsController@edit');


// f複写機能（ボタン）
Route::get('tasklists/{id}/copy', 'TasklistsController@copy');
*/

/* デフォルトの状態
Route::get('/', function () {
    return view('welcome');
});
*/ 


Route::get('/', 'WelcomeController@index');
//Route::resource('tasklists', 'TasklistsController');


// ユーザ登録  ->name()は、このルーティングに名前をつけているだけである。 後ほど、Form や link_to_route() で使用する。
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

// ログイン処理
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

// ログイン認証付きのルーティング
Route::group(['middleware' => 'auth'], function(){
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('tasklists', 'TasklistsController');
});