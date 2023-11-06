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

Route::get('/', function () {
    return view('welcome');
});
Route::get('player/load','App\Http\Controllers\PlayerController@loadList');
Route::post('player/insert','App\Http\Controllers\PlayerController@insert');
Route::get('player/delete/{id}','App\Http\Controllers\PlayerController@destroy');