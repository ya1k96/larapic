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

use App\Image;

Route::get('/', function () {

    $images = Image::all();
        
    return view('imagen-prueba', ['imagenes' => $images]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/config', 'UserController@config')->name('config');

/* Rutas de usuario */
Route::post('user/update', 'UserController@update')->name('user.update');
Route::get('user/avatar/{filename}','UserController@getImage')->name('user.avatar');

/* Rutas de imagenes */
Route::get('image/{filename}','ImageController@getImage')->name('image.get');
Route::get('image/detail/{id}', 'ImageController@detail')->name('image.detail');

Route::post('image/comment', 'CommentController@comment')->name('image.comment');
Route::get('image/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

Route::get('image/create', 'ImageController@create')->name('image.create');
Route::post('image/save', 'ImageController@save')->name('image.save');

Route::get('image/like/{image_id}', 'LikeController@like')->name('image.like');
Route::get('image/dislike/{image_id}', 'LikeController@dislike')->name('image.dislike');