<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePedidoRequest;
use App\Http\Requests\CreateProductoRequest;
use App\Models\Pedido;
use App\Models\Producto;
use Cloudinary;
use Illuminate\Http\Request;

class AdministracionController extends Controller {

	public function productos() {
		return view('productos.adminproductos');
	}

    public function create(Request $request) {        
        $imagen_url = Cloudinary::uploadFile( $request ->file( 'imagen' )->getRealPath (), ['folder' => 'detalles_evertec'])->getSecurePath ();
        $producto = Producto::create([
			'estado' => $request->input('estado_producto'),
			'imagen' => $imagen_url,
			'nombre_producto' => $request->input('nombre_producto'),
			'descripcion_producto' => $request->input('descripcion_producto'),
			'categoria_producto' => $request->input('categoria_producto'),
			'valor_producto' => $request->input('valor_producto'),
		]);
		return redirect('/administracion/productos/creado');
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
		return view('productos.editarproducto', [
			'producto' => $producto,
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
		$producto->categoria_producto = $request->categoria_producto;
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
	
	public function Procesarmensaje(Request $request) {
		$mensaje = Mensaje::find($request->id_mensaje);
		$mensaje->estado_mensaje = 'Procesado';
		$mensaje->save();
		return redirect('/administracion/mensajes');
	}
	public function Editarpedido($id) {
		$pedido = Pedido::find($id);
		return view('pedidos.editarpedido', [
			'pedido' => $pedido,
		]);
	}
	public function Savepedido(CreatePedidoRequest $request) {
		$pedido = Pedido::find($request->id_pedido);
		if ($pedido->estado == 'pendiente de pago') {
			$estado = 'pendiente de pago';
		}
		if ($pedido->estado == 'en proceso') {
			$estado = 'en proceso';
		}
		if ($pedido->estado == 'procesado') {
			$estado = 'procesado';
		}
		$pedido->estado = $request->estado_pedido;
		$pedido->direccion_envio = $request->direccion_envio;
		$pedido->apto_casa_oficina = $request->info_direccion;
		$pedido->barrio = $request->barrio;
		$pedido->fecha_entrega = $request->fecha_entrega;
		$pedido->hora_entrega = $request->hora_entrega;
		$pedido->nombre_contacto = $request->nombre_contacto;
		$pedido->celular_contacto = $request->celular_contacto;
		$pedido->email_contacto = $request->email_contacto;
		$pedido->medio_pago = $request->forma_pago;
		$pedido->codigo_promocional = $request->codigo_promocional;

		$pedido->save();

		if ($estado == 'en proceso') {
			return redirect('/administracion/pedidos');
		}
		if ($estado == 'pendiente de pago') {
			return redirect('/administracion/pedidos/pendientepago');
		}
		if ($estado == 'procesado') {
			return redirect('/administracion/pedidos/procesado');
		}
	}
	public function mensajes() {
		$mensajes = Mensaje::where('estado_mensaje', 'en proceso')->get();
		return view('mensajes.adminmensajes', [
			'mensajes' => $mensajes,
		]);
	}
	public function MensajesProcesados() {
		$mensajes = Mensaje::where('estado_mensaje', 'Procesado')->get();
		return view('mensajes.mensajesprocesados', [
			'mensajes' => $mensajes,
		]);
	}
	public function descuentos() {
		$descuentos = Descuento::all();
		return view('pedidos.descuentos', [
			'descuentos' => $descuentos,
		]);
	}
	public function Editardescuento($id) {
		$descuento = Descuento::find($id);
		return view('pedidos.editardescuento', [
			'descuento' => $descuento,
		]);
	}
	public function savedescuento(Request $request) {
		$descuento = Descuento::find($request->id_descuento);
		$descuento->codigo = $request->codigo_descuento;
		$descuento->descuento = $request->porcentaje_descuento;
		$descuento->estado = $request->estado_descuento;
		$descuento->email = $request->email_descuento;
		$descuento->save();

		return redirect('/administracion/descuentos');
	}
	public function newdescuento() {
		return view('pedidos.newdescuento');
	}
	public function savenewdescuento(Request $request) {
		$descuento = Descuento::create([
			'codigo' => $request->input('codigo_descuento'),
			'descuento' => $request->input('porcentaje_descuento'),
			'estado' => 'activo',
			'email' => $request->input('email_descuento'),
		]);
		return redirect('/administracion/descuentos');
	}
	public function Tarjetas() {
		$tarjetas = Tarjeta::all();
		return view('pedidos.tarjetas', [
			'tarjetas' => $tarjetas,
		]);
	}
	public function TarjetasEditar(Request $request) {
		$tarjeta = Tarjeta::find($request->id_tarjeta);
		$tarjeta->estado = 'procesado';
		$tarjeta->save();

		return redirect('/administracion/pedidos/tarjetas');
	}

}
