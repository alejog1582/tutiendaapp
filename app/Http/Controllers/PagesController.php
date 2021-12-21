<?php

namespace App\Http\Controllers;

use App\Auth;
use App\Http\Requests\CreateMensajeRequest;
use App\Models\Producto;

class PagesController extends Controller {
	public function home() {
		$user = \Auth::user();
		return view('welcome', [
			'user' => $user,
		]);
	}	

	public function show_anchetas() {
		$categoria = 'anchetas';
		$productos = Producto::where('categoria_producto', 'anchetas')->get();
		return view('productos.estandar', [
			'productos' => $productos,
			'categoria' => $categoria,
		]);
	}
	
	Public function show_cumpleanos() {
		$categoria = 'cumpleanos';
		$productos = Producto::where('categoria_producto', 'cumpleanos')->get();
		return view('productos.estandar', [
			'productos' => $productos,
			'categoria' => $categoria,
		]);
	}
	
	Public function show_aniversario() {
		$categoria = 'aniversario';
		$productos = Producto::where('categoria_producto', 'aniversario')->get();
		return view('productos.estandar', [
			'productos' => $productos,
			'categoria' => $categoria,
		]);
	}
	
	Public function show_picnic() {
		$categoria = 'picnic';
		$productos = Producto::where('categoria_producto', 'picnic')->get();
		return view('productos.estandar', [
			'productos' => $productos,
			'categoria' => $categoria,
		]);
	}
	
	Public function show_endulzadas() {
		$categoria = 'endulzadas';
		$productos = Producto::where('categoria_producto', 'endulzadas')->get();
		return view('productos.estandar', [
			'productos' => $productos,
			'categoria' => $categoria,
		]);
	}
	
	Public function show_light() {
		$categoria = 'light';
		$productos = Producto::where('categoria_producto', 'light')->get();
		return view('productos.estandar', [
			'productos' => $productos,
			'categoria' => $categoria,
		]);
	}
	

}
