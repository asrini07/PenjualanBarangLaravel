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

//CRUD Barang
Route::prefix('barang')->group(function () {
    Route::get('/', 'BarangController@index');
    Route::get('/create',"BarangController@create")->name('create-barang');
    Route::post('/save', 'BarangController@store')->name('store-barang');
    Route::get('/edit/{id}',"BarangController@edit");
    // Route::get('/{id}', 'GendreController@show');
    Route::post('/update/{id}', 'BarangController@update')->name('update-barang');
});
