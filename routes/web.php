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




Route::get('imprimircliente','App\Http\Controllers\PdfController@imprimirCliente')->name('id_cliente');
Route::get('imprimirvendedor','App\Http\Controllers\PdfController@imprimirVendedor')->name('id_vendedor');
Route::get('imprimirproducto','App\Http\Controllers\PdfController@imprimirProducto')->name('id_producto');
Route::get('imprimirguion','App\Http\Controllers\PdfController@imprimirGuion')->name('id_guion');
Route::get('imprimiratencion','App\Http\Controllers\PdfController@imprimirAtencion')->name('id_atencion');
Route::resource('cliente', 'App\Http\Controllers\clienteController');
Route::resource('vendedor', 'App\Http\Controllers\vendedorController');
Route::resource('producto', 'App\Http\Controllers\productoController');
Route::resource('guion', 'App\Http\Controllers\guionController');
Route::resource('atencion', 'App\Http\Controllers\AtencionController');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', 'App\Http\Controllers\vendedorController@profile');
Route::post('atencion/create', 'App\Http\Controllers\AtencionController@show');

Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

