<?php

use App\Post;
// use Illuminate\Routing\Route;

// use Illuminate\Routing\Route;

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


// cetak pdf
Route::get('/articles/cetak/{article}', 'ArticleController@cetak')->name('cetak');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles', 'ArticleController@index')->name('article');
Route::get('/articles/{article}', 'ArticleController@show')->name('detail');


Route::group(['middleware' => ['roles:user']], function () {
    Route::get('/create', 'ArticleController@create')->name('create');
    Route::post('/store', 'ArticleController@store')->name('store');
    Route::put('/update/{article}', 'ArticleController@update')->name('update');
    Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('edit');
    Route::get('/articles/delete/{article}', 'ArticleController@destroy')->name('delete');
    // Route::get('/articles/cetakPDF', 'ArticleController@cetakPDF')->name('cetakPDF');
});

Route::group(['middleware' => ['roles:admin']], function () {
    Route::get('/dashboard', 'AdminController@index')->name("dashboard");
    Route::get('/user/admin', 'AdminController@admin')->name("admin");
    Route::get('/user/biasa', 'AdminController@biasa')->name("biasa");
    Route::get('/tambah', 'AdminController@create')->name("tambah");
    Route::get('user/delete/{user}', 'AdminController@destroy')->name("hapus");
    Route::post('/storeAdmin', 'AdminController@store')->name("tambahStore");
    Route::get('/article', 'AdminController@article')->name('allArticle');
    Route::get('/user/print', 'AdminController@print')->name("printAdmin");
});

Route::get('/profile/{user}', 'UserController@index')->name("detailUser");

// Route::get('/newsBaru', 'NewsControllerBaru@getData');


// learn API
Route::get('/news', 'NewsController@displayNews')->name('news');
Route::post('/sourceId', 'NewsController@displayNews')->name('news');
