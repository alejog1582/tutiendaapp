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
Route::get('/catalago/anchetas', [App\Http\Controllers\PagesController::class, 'show_anchetas']);
Route::get('/catalago/cumpleanos' , [App\Http\Controllers\PagesController::class, 'show_cumpleanos']);
Route::get('/catalago/aniversario' , [App\Http\Controllers\PagesController::class, 'show_aniversario']);
Route::get('/catalago/picnic',  [App\Http\Controllers\PagesController::class, 'show_picnic']);
Route::get('/catalago/endulzadas',  [App\Http\Controllers\PagesController::class, 'show_endulzadas']);
Route::get('/catalago/light',  [App\Http\Controllers\PagesController::class, 'show_light']);
Route::get('/prepedido/{id}/',  [App\Http\Controllers\PedidoController::class, 'prepedido']);
Route::post('/pedido',  [App\Http\Controllers\PedidoController::class, 'create']);
Route::get('/resultpedido/{id}',  [App\Http\Controllers\PedidoController::class, 'resultpedido']);

Route::get('/dashboard',  [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('/pagopedido/{id}',  [App\Http\Controllers\PedidoController::class, 'pagopedido']);



Route::group(['middleware' => 'admin'], function () {
	Route::get('/administracion/productos', [App\Http\Controllers\AdministracionController::class, 'productos']);
	Route::post('/administracion/productos/create', [App\Http\Controllers\AdministracionController::class, 'create']);
	Route::get('/administracion/productos/creado', [App\Http\Controllers\AdministracionController::class, 'productoscreado']);
	Route::get('/administracion/productosexistentes', [App\Http\Controllers\AdministracionController::class, 'productosexistentes']);
	Route::get('/administracion/editarproducto/{id}', [App\Http\Controllers\AdministracionController::class, 'editarproducto']);
	Route::post('/administracion/saveproducto', [App\Http\Controllers\AdministracionController::class, 'saveproducto']);
	Route::get('/administracion/productosdesactivados',  [App\Http\Controllers\AdministracionController::class, 'productosdesactivados']);
	Route::get('/administracion/pedidos', [App\Http\Controllers\AdministracionController::class, 'pedidos']);
	Route::get('/administracion/pedidos/procesado', [App\Http\Controllers\AdministracionController::class, 'procesado']);
	Route::get('/administracion/pedidos/rechazados', [App\Http\Controllers\AdministracionController::class, 'rechazados']);	
});
