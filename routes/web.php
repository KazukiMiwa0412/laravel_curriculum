<?php


use Illuminate\Support\Facades\Route;
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
Route::get('/posts/search', 'PostController@search')->name('posts.search');
Route::get('/login', function(){
    return view('login');
});
Route::get('/index', 'PostController@index')->name('posts.index');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');




Route::post('/posts', 'PostController@store')->name('posts.store');

Route::put('/posts/{post}', 'PostController@update')->name('posts.update');

Route::delete('/posts/{post}', 'PostController@delete')->name('posts.delete');


Auth::routes();
Route::get('/users/search', 'UserController@search')->name('users.search');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/users/{user}','UserController@show')->name('users.show');
Route::resource('/users','UserController', ['except' => ['show']]);
