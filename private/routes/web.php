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

Route::get('/', function () {
    return view('welcome');
});

//route untuk Blog
Route::group(['prefix' => 'blog'], function(){
  Route::get('/','BlogController@index')->name('blog');
  Route::get('/tambah','BlogController@create')->name('blog.create');
  Route::post('/tambah','BlogController@store')->name('blog.store');
  Route::get('/detail/{blog}','BlogController@show')->name('blog.show');
  Route::get('/edit/{blog}','BlogController@edit')->name('blog.edit');
  Route::put('/edit/{blog}','BlogController@update')->name('blog.update');
  Route::delete('/hapus/{blog}','BlogController@destroy')->name('blog.delete');
});
