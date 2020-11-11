<?php

use App\Post;

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

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles', 'ArticleController@index')->name('article');
Route::get('/articles/{article}', 'ArticleController@show')->name('detail');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/create', 'ArticleController@create')->name('create');
    Route::post('/store', 'ArticleController@store')->name('store');
    Route::put('/update/{article}', 'ArticleController@update')->name('update');
    Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('edit');
    Route::get('/articles/delete/{article}', 'ArticleController@destroy')->name('delete');
});

// posts 
Route::get('/posts', 'PostController@index')->name('post.index');
Route::get('/posts/{post}', 'PostController@show')->name('post.show');

Route::get('/posts/{post}/comments', function (Post $post) {
    return $post->comments;
});

Route::post('/posts/{post}/comments', function (Request $request, Post $post) {
    $comment = new \Laravelista\Comments\Comment;
    $comment->commenter()->associate(auth()->user());
    $comment->commentable()->associate($post);
    $comment->comment = $request->comment;
    $comment->approved = true;
    $comment->save();

    return $comment;
});
