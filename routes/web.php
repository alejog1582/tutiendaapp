<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\PedidoController;

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

Route::get('/', [App\Http\Controllers\PagesController::class, 'home']);
Route::get('/catalago/{id}', [App\Http\Controllers\PagesController::class, 'productos_marca']);
Route::get('/prepedido/{id}/',  [App\Http\Controllers\PedidoController::class, 'prepedido']);
Route::post('/pedido',  [App\Http\Controllers\PedidoController::class, 'create']);
Route::get('/resultpedido/{id}',  [App\Http\Controllers\PedidoController::class, 'resultpedido']);

Route::get('/dashboard',  [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('/pagopedido/{id}',  [App\Http\Controllers\PedidoController::class, 'pagopedido']);



Route::group(['middleware' => 'admin'], function () {
	Route::get('/administracion/productos', [App\Http\Controllers\AdministracionController::class, 'productos']);
	Route::get('/administracion/marcas', [App\Http\Controllers\AdministracionController::class, 'marcas']);
	Route::get('/administracion/marcas/new', [App\Http\Controllers\AdministracionController::class, 'marcasnew']);
	Route::post('/administracion/marcas/newsave', [App\Http\Controllers\AdministracionController::class, 'createmarca']);
	Route::post('/administracion/productos/create', [App\Http\Controllers\AdministracionController::class, 'create']);
	Route::get('/administracion/productos/creado', [App\Http\Controllers\AdministracionController::class, 'productoscreado']);
	Route::get('/administracion/productosexistentes', [App\Http\Controllers\AdministracionController::class, 'productosexistentes']);
	Route::get('/administracion/editarproducto/{id}', [App\Http\Controllers\AdministracionController::class, 'editarproducto']);
	Route::get('/administracion/editarmarca/{id}', [App\Http\Controllers\AdministracionController::class, 'editarmarca']);
	Route::post('/administracion/saveproducto', [App\Http\Controllers\AdministracionController::class, 'saveproducto']);
	Route::post('/administracion/savemarca', [App\Http\Controllers\AdministracionController::class, 'savemarca']);
	Route::get('/administracion/productosdesactivados',  [App\Http\Controllers\AdministracionController::class, 'productosdesactivados']);
	Route::get('/administracion/pedidos', [App\Http\Controllers\AdministracionController::class, 'pedidos']);
	Route::get('/administracion/pedidos/procesado', [App\Http\Controllers\AdministracionController::class, 'procesado']);
	Route::get('/administracion/pedidos/rechazados', [App\Http\Controllers\AdministracionController::class, 'rechazados']);	
});
