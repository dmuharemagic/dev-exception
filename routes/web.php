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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/', 'PostsController@index')->name('sort.default');

Route::get('references', function() {
    return view('references');
})->name('references');

Route::resource('post', 'PostsController', ['except' => 'index']);

Route::post('post/{id}/vote/{type}', 'PostsController@vote')->name('post.vote');
Route::post('post/{id}/reply/new}', 'ReplyController@store')->name('reply.store');

Route::get('random', 'PostsController@random')->name('random');

Route::get('/sort/hot', 'PostsController@hot')->name('sort.hot');
Route::get('/sort/new', 'PostsController@new')->name('sort.new');
Route::get('/sort/rising', 'PostsController@rising')->name('sort.rising');

Route::get('user/list', 'ProfileController@list')->name('user.list');
Route::get('user/{id}/profile', 'ProfileController@show')->name('user.show');

Route::get('search', 'PostsController@search')->name('search');
