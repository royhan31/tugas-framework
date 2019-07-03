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

Route::group(['prefix' => 'karyawan'], function(){
  Route::get('/','KaryawanController@index')->name('SemuaKaryawan');
  Route::get('/tambahkaryawan','KaryawanController@create')->name('karyawan.create');
  Route::post('/tambahkaryawan','KaryawanController@store')->name('karyawan.store');
  Route::get('/edit/{karyawan}','KaryawanController@edit')->name('karyawan.edit');
  Route::put('/edit/{karyawan}','KaryawanController@update')->name('karyawan.update');
  Route::delete('/hapus/{karyawan}','KaryawanController@destroy')->name('karyawan.delete');
});



Route::group(['prefix' => 'user'], function(){
  Route::get('/','UserController@index')->name('user');
  Route::get('/tambah','UserController@create')->name('user.create');
  Route::post('/tambah','UserController@store')->name('user.store');
  Route::get('/tampil/{user}','UserController@show')->name('user.show');
  Route::get('/edit/{user}','UserController@edit')->name('user.edit');
  Route::put('/edit/{user}','UserController@update')->name('user.update');
  Route::delete('/hapus/{user}','UserController@destroy')->name('user.delete');
});
