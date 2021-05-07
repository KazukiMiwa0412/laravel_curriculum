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
Route::get('/posts/search', 'PostController@search')->name('search');
Route::get('/login', function(){
    return view('login');
});
Route::get('/index', 'PostController@index')->name('index');
Route::get('/posts/create', 'PostController@create')->name('create');
Route::get('/posts/{post}', 'PostController@show')->name('show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('edit');




Route::post('/posts', 'PostController@store')->name('store');

Route::put('/posts/{post}', 'PostController@update')->name('update');

Route::delete('/posts/{post}', 'PostController@delete')->name('delete');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/users/{user_name}','UserController@show')->name('users.show');
Route::resource('/users','UserController', ['except' => ['show']]);
