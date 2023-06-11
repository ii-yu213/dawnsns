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


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');



//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@update');

Route::get('/search','UsersController@index');
Route::post('/search','UsersController@search');

Route::get('/followList','FollowsController@followList');
Route::get('/followerList','FollowsController@followerList');

Route::get('/logout', 'PostsController@logout');

Route::post('/post/create','PostsController@create');



Route::get('/{user_id}/otherUser','UsersController@other');

Route::put('/{id}/update-form','PostsController@update');

Route::get('post/{id}/delete','PostsController@delete');

Route::get('/{id}/follow','FollowsController@follow');
Route::get('/{id}/unfollow','FollowsController@delete');
