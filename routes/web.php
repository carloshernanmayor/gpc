<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\VendedorMiddleware;

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
Route::get('imprimirclienteadmin','App\Http\Controllers\PdfController@imprimirClienteAdmin')->name('id_cliente')->middleware('auth');
Route::get('imprimirvendedor','App\Http\Controllers\PdfController@imprimirVendedor')->name('id_vendedor')->middleware('auth');
Route::get('imprimirproducto','App\Http\Controllers\PdfController@imprimirProducto')->name('id_producto')->middleware('auth');
Route::get('imprimirguion','App\Http\Controllers\PdfController@imprimirGuion')->name('id_guion')->middleware('auth');
Route::get('imprimiratencion','App\Http\Controllers\PdfController@imprimirAtencion')->name('id_atencion')->middleware('auth');
Route::resource('cliente', 'App\Http\Controllers\clienteController')->middleware(['auth',VendedorMiddleware::class]);
Route::resource('vendedor', 'App\Http\Controllers\vendedorController')->middleware(['auth', AdminMiddleware::class]);
Route::resource('producto', 'App\Http\Controllers\productoController')->middleware(['auth',VendedorMiddleware::class]);
Route::resource('guion', 'App\Http\Controllers\guionController')->middleware(['auth',VendedorMiddleware::class]);
Route::resource('atencion', 'App\Http\Controllers\AtencionController')->middleware(['auth',VendedorMiddleware::class]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth',AdminMiddleware::class]);;
Route::get('/homeven', [App\Http\Controllers\HomeController::class, 'index'])->name('homeven')->middleware(['auth',VendedorMiddleware::class]);
Route::get('/atencionadmin', [App\Http\Controllers\AtencionController::class, 'indexAdmin'])->name('atencionadmin')->middleware(['auth',AdminMiddleware::class]);;
Route::get('/createatenadmin', [App\Http\Controllers\AtencionController::class, 'createAdmin'])->name('createatenadmin')->middleware(['auth',AdminMiddleware::class]);;
Route::get('/editatenadmin', [App\Http\Controllers\AtencionController::class, 'editAdmin'])->name('editatenadmin')->middleware(['auth',AdminMiddleware::class]);;

Route::get('/clientesadmin', [App\Http\Controllers\clienteController::class, 'indexAdmin'])->name('clientesadmin')->middleware(['auth',AdminMiddleware::class]);
Route::get('/editclientesadmin', [App\Http\Controllers\clienteController::class, 'editAdmin'])->name('editclientesadmin')->middleware(['auth',AdminMiddleware::class]);;

Route::get('/productosadmin', [App\Http\Controllers\productoController::class, 'indexAdmin'])->name('productosadmin')->middleware(['auth',AdminMiddleware::class]);;

Route::get('/guionadmin', [App\Http\Controllers\guionController::class, 'indexAdmin'])->name('guionadmin')->middleware(['auth',AdminMiddleware::class]);;

Route::get('/profile', 'App\Http\Controllers\vendedorController@profile')->middleware('auth');

Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout')->middleware('auth');

