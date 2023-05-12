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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\NewsController@index');
Route::get('news/','App\Http\Controllers\NewsController@index');
Route::get('news/create','App\Http\Controllers\NewsController@create');
Route::post('news/create','App\Http\Controllers\NewsController@store');
Route::get('news/read/{id}','App\Http\Controllers\NewsController@show');
Route::get('news/edit/{id}','App\Http\Controllers\NewsController@edit');
Route::post('news/edit/{id}','App\Http\Controllers\NewsController@update');
Route::post('news/delete','App\Http\Controllers\NewsController@destroy');

