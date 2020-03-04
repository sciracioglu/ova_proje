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

Route::get('logo/{id}', 'BaBsController@logo');
Route::get('/', 'BaBsController@index');
Route::get('/{id}', 'BaBsController@show');
Route::get('onay/{id}', 'BaBsController@store');
Route::get('mesaj/{id}/{tip}', 'MesajController@index');
Route::post('mesaj', 'MesajController@store');
Route::get('bakiye', 'BakiyeController@index');
Route::get('bakiye/{id}', 'BakiyeController@show');
Route::get('bakiye_onay/{id}', 'BakiyeController@store');
Route::get('bakiye_mektup/{id}', 'BakiyeController@download');

Route::get('bordro', 'BordroController@index');
Route::get('bordro-goster', 'BordroController@show');
