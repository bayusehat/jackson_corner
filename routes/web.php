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
//Route::middleware(['have-code'])->group(function () {
//    Route::get('/access','App\Http\Controllers\PlayerController@splash');
//});
//Route::post('/access/get','App\Http\Controllers\PlayerController@getCodeAccess');
//Route::get('/access/remove','App\Http\Controllers\PlayerController@removeCodeAccess');
Route::middleware(['ifLogged'])->group(function () {
    Route::get('/','App\Http\Controllers\PlayerController@splash')->name('login');
});
Route::post('/doLogin','App\Http\Controllers\AuthController@doLogin')->name('doLogin');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('welcome');
    });
    Route::get('player/load','App\Http\Controllers\PlayerController@loadList');
    Route::post('player/insert','App\Http\Controllers\PlayerController@insert');
    Route::get('player/delete/{id}','App\Http\Controllers\PlayerController@destroy');
    Route::get('player/code/{code}','App\Http\Controllers\PlayerController@checkCode');
    Route::get('player/edit/{id}','App\Http\Controllers\PlayerController@edit');
    Route::post('player/update/{id}','App\Http\Controllers\PlayerController@update');
    Route::get('/doLogout','App\Http\Controllers\AuthController@doLogout')->name('doLogout');

    Route::get('peserta','App\Http\Controllers\PesertaController@index');
    Route::post('peserta/insert','App\Http\Controllers\PesertaController@insert');

    Route::get('kota','App\Http\Controllers\PesertaController@kota');
    Route::get('toko/{kota}','App\Http\Controllers\PesertaController@toko');
    Route::get('peserta/list/{regional}/{toko}','App\Http\Controllers\PesertaController@getDataPeserta');
    Route::get('peserta/duplicate/{regional}/{toko}','App\Http\Controllers\PesertaController@cekDuplicate');
    Route::get('peserta/export','App\Http\Controllers\PesertaController@exportDataPeserta');
});

Route::get('/createadmin/{code}','App\Http\Controllers\AuthController@createAdmin');
