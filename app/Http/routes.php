<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('list',['uses'=> 'SinhVienController@getList']);
Route::post('add',['uses'=> 'SinhVienController@getAdd']);
Route::get('edit/{id}',['uses'=> 'SinhVienController@getEdit']);
Route::post('edit/{id}',['uses'=> 'SinhVienController@postEdit']);
Route::get('delete/{id}',['uses'=> 'SinhVienController@getDelete']);


