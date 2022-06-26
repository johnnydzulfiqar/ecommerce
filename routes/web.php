<?php

use Illuminate\Support\Facades\Route;
use App\Htpp\Controller\ProdukController;
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

Route::get('/produk', 'App\Http\Controllers\ProdukController@index');
Route::get('/produk/create', 'App\Http\Controllers\ProdukController@create');
Route::post('/produk/create', 'App\Http\Controllers\ProdukController@store');
Route::get('/produk/{produk}/edit', 'App\Http\Controllers\ProdukController@edit')->name(name: 'produk.edit');
Route::patch('/produk/{produk}', 'App\Http\Controllers\ProdukController@update')->name(name: 'produk.update');
Route::delete('/produk/{produk}', 'App\Http\Controllers\ProdukController@destroy')->name(name: 'produk.update');
// Route::resource('produk', 'App\Http\Controllers\ProdukController');
