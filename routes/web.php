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
    return view('viewblog.index');
});
Route::get('/post', function () {
    return view('viewblog.blog-post');
});

Route::group(['prefix'=>'chude','as'=>'chude.'], function(){
    Route::get('/', 'ChuDeController@index')->name('index');
	Route::get('/create', 'ChuDeController@create')->name('chuDeCreate');;
	Route::post('/store', 'ChuDeController@store')->name('chuDeStore');
	Route::get('/edit/{id}', 'ChuDeController@edit')->name('chuDeEdit');
	Route::put('/update/{id}', 'ChuDeController@update')->name('chuDeUpdate');
	Route::get('/destroy/{id}', 'ChuDeController@destroy')->name('chuDeDestroy');
});
Route::group(['prefix'=>'baiviet','as'=>'baiviet.'], function(){
    Route::get('/', 'BaiVietController@index')->name('index');
	Route::get('/create', 'BaiVietController@create')->name('baivietCreate');;
	Route::post('/store', 'BaiVietController@store')->name('baivietStore');
	Route::get('/edit/{id}', 'BaiVietController@edit')->name('baivietEdit');
	Route::put('/update/{id}', 'BaiVietController@update')->name('baivietUpdate');
	Route::get('/destroy/{id}', 'BaiVietController@destroy')->name('baivietDestroy');
});