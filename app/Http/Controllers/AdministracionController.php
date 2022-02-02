<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePedidoRequest;
use App\Http\Requests\CreateMarca;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Marca;
use Cloudinary;
use Illuminate\Http\Request;

class AdministracionController extends Controller {

	public function productos() {
		$marcas = Marca::where('estado', 'activo')->get();
		$reg_marcas = true;
		if (count($marcas) == 0) {
			$reg_marcas = false;		
		}
		return view('productos.adminproductos', [
			'marcas' => $marcas,
			'reg_marcas' => $reg_marcas,
		]);
	}

	public function marcas() {
		$marcas = Marca::all();
		return view('marcas.adminmarcas', [
			'marcas' => $marcas,
		]);
	}

	public function marcasnew() {
		return view('marcas.newmarca');
	}

    public function create(Request $request) {        
        $imagen_url = Cloudinary::uploadFile( $request ->file( 'imagen' )->getRealPath (), ['folder' => 'tu_tienda_app'])->getSecurePath ();
        $producto = Producto::create([
			'estado' => $request->input('estado_producto'),
			'imagen' => $imagen_url,
			'nombre_producto' => $request->input('nombre_producto'),
			'descripcion_producto' => $request->input('descripcion_producto'),
			'talla_producto' => $request->input('talla_producto'),
			'cantidad_producto' => $request->input('cantidad_producto'),
			'id_marca_producto' => $request->input('marca_producto'),
			'valor_producto' => $request->input('valor_producto'),
		]);
		return redirect('/administracion/productos/creado');
	}

	public function createmarca(CreateMarca $request) {        
        $marca = Marca::create([
			'nombre_marca' => $request->input('nombre_marca'),
			'referencia_marca' => $request->input('referencia_marca'),
			'estado' => 'activo',			
		]);
		return redirect('/administracion/marcas');
	}

	public function productoscreado() {
		return view('productos/creado');
	}

    public function productosexistentes() {
		$productos = Producto::where('estado', 'activo')->get();
		return view('productos.listadoactivoadmin', [
			'productos' => $productos,
		]);
	}

    public function productosdesactivados() {
		$productos = Producto::where('estado', 'desactivo')->get();
		return view('productos.listadodesactivoadmin', [
			'productos' => $productos,
		]);
	}

    public function editarproducto($id) {
		$producto = Producto::find($id);
		$marcas = Marca::where('estado', 'activo')->get();
		return view('productos.editarproducto', [
			'producto' => $producto,
			'marcas' => $marcas,
		]);

	}

	public function editarmarca($id) {
		$marca = Marca::find($id);
		return view('marcas.editarmarca', [
			'marca' => $marca,
		]);

	}

    public function saveproducto(Request $request) {
		$producto = Producto::find($request->id_producto);
		if ($request->estado_producto == 'activo') {
			$estado = 'activo';
		}
		if ($request->estado_producto == 'desactivo') {
			$estado = 'desactivo';
		}
		$producto->nombre_producto = $request->nombre_producto;
		$producto->descripcion_producto = $request->descripcion_producto;
		$producto->talla_producto = $request->talla_producto;
		$producto->cantidad_producto = $request->cantidad_producto;
		$producto->id_marca_producto = $request->marca_producto;
		$producto->estado = $request->estado_producto;
		$producto->valor_producto = $request->valor_producto;

		$producto->save();

		if ($estado == 'activo') {
			return redirect('/administracion/productosexistentes');
		}
		if ($estado == 'desactivo') {
			return redirect('/administracion/productosdesactivados');
		}

	}

	public function savemarca(Request $request) {
		$marca = Marca::find($request->id_marca);
		if ($request->estado_marca == 'activo') {
			$estado = 'activo';
		}
		if ($request->estado_marca == 'desactivo') {
			$estado = 'desactivo';
		}
		$marca->nombre_marca = $request->nombre_marca;
		$marca->referencia_marca = $request->referencia_marca;
		$marca->estado = $estado;

		$marca->save();

		return redirect('/administracion/marcas');
		

	}

	public function pedidos() {
		$pedidos = Pedido::where('status', 'CREATED')->get();
		$estado = 'CREATED';
		return view('pedidos.adminpedidos', [
			'pedidos' => $pedidos,
			'estado' => $estado,
		]);
	}

	public function procesado() {
		$pedidos = Pedido::where('status', 'PAYED')->get();
		$estado = 'PAYED';
		return view('pedidos.adminpedidos', [
			'pedidos' => $pedidos,
			'estado' => $estado,
		]);
	}

	public function rechazados() {
		$pedidos = Pedido::where('status', 'REJECTED')->get();
		$estado = 'REJECTED';
		return view('pedidos.adminpedidos', [
			'pedidos' => $pedidos,
			'estado' => $estado,
		]);
	}
		
	public function Editproddesactivo($id) {
		$producto = Producto::find($id);
		return view('productos.editproddesactivo', [
			'producto' => $producto,
		]);
	}	
}
