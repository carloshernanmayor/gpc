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
Route::get('imprimirproductoservicio','App\Http\Controllers\PdfController@imprimirProductoServicio')->name('id_producto_servicio');
Route::get('imprimirmarketing','App\Http\Controllers\PdfController@imprimirMarketing')->name('id_marketing');
Route::resource('cliente', 'App\Http\Controllers\clienteController');
Route::resource('vendedor', 'App\Http\Controllers\vendedorController');
Route::resource('productoservicio', 'App\Http\Controllers\productoservicioController');
Route::resource('marketing', 'App\Http\Controllers\marketingController');
Route::resource('atencion', 'App\Http\Controllers\AtencionController');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
;
Route::get('/profile', 'App\Http\Controllers\vendedorController@profile');




Route::get('/logout', 'AuthController@logout')->name('logout');

