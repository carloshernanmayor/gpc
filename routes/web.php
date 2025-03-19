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




Route::get('imprimircliente','App\Http\Controllers\PdfController@imprimirCliente')->name('id_cliente')->middleware('auth');
Route::get('imprimirvendedor','App\Http\Controllers\PdfController@imprimirVendedor')->name('id_vendedor')->middleware('auth');
Route::get('imprimirproducto','App\Http\Controllers\PdfController@imprimirProducto')->name('id_producto')->middleware('auth');
Route::get('imprimirguion','App\Http\Controllers\PdfController@imprimirGuion')->name('id_guion')->middleware('auth');
Route::get('imprimiratencion','App\Http\Controllers\PdfController@imprimirAtencion')->name('id_atencion')->middleware('auth');
Route::resource('cliente', 'App\Http\Controllers\clienteController')->middleware('auth');
Route::resource('vendedor', 'App\Http\Controllers\vendedorController')->middleware('auth');
Route::resource('producto', 'App\Http\Controllers\productoController')->middleware('auth');
Route::resource('guion', 'App\Http\Controllers\guionController')->middleware('auth');
Route::resource('atencion', 'App\Http\Controllers\AtencionController')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', 'App\Http\Controllers\vendedorController@profile')->middleware('auth');

Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout')->middleware('auth');

