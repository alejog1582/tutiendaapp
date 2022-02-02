<?php

namespace App\Http\Controllers;

use App\Auth;
use App\Http\Requests\CreateMensajeRequest;
use App\Models\Producto;
use App\Models\Marca;

class PagesController extends Controller {
	public function home() {
		$user = \Auth::user();
		$marcas = Marca::all();
		$reg_marcas = true;
		if (count($marcas) == 0) {
			$reg_marcas = false;		
		}
		return view('welcome', [
			'user' => $user,
			'marcas' => $marcas,
			'reg_marcas' => $reg_marcas,
			
		]);
	}	

	public function productos_marca($id) {
		$marcas = Marca::where('id', $id)->get();
		$categoria = $marcas[0]->nombre_marca;
		$productos = Producto::where('id_marca_producto', $id)->get();
		$reg_productos = true;
		if (count($productos) == 0) {
			$reg_productos = false;		
		}
		return view('productos.estandar', [
			'productos' => $productos,
			'categoria' => $categoria,
			'reg_productos' => $reg_productos,
		]);
	}
}
