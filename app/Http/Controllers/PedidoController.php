<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    public function prepedido($id) {
		$producto = Producto::find($id);
		return view('pedidos.prepedido', [
			'producto' => $producto,
		]);
	}

    public function create(Request $request) {
		
        $pedido = Pedido::create([
            'id_producto' => $request->input('id_producto'),
			'customer_name' => $request->input('nombre_contacto'),
			'customer_email' => $request->input('email_contacto'),
			'customer_mobile' => $request->input('celular_contacto'),
			'status' => 'CREATED',
			'cantidades' => '1',
			'direccion_envio' => $request->input('direccion_envio'),
			'apto_casa_oficina' => $request->input('info_adicional_direccion'),
			'barrio' => $request->input('barrio'),
			'fecha_entrega' => $request->input('fecha_entrega'),
			'hora_entrega' => $request->input('hora_entrega'),
			'medio_pago' => $request->input('forma_pago'),
			'valor_pedido' => $request->input('valor_producto'),			
		]);

        $year = date("Y");
        $mes = date("m");
        $pedido->id_unico_pedido = $year . $mes . "00" . $pedido->id;

        $pedido->save();
		
        $seed = date('c');
		$fecha_expiration = strtotime( '+10 minute' , strtotime ($seed));
		$fecha_expiration_format = date ('c', $fecha_expiration);
		if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
        $nonceBase64 = base64_encode($nonce);
        $secretKey = '024h1IlD';
        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));
        $response = Http::post('https://dev.placetopay.com/redirection/api/session/', [
            'locale'=> 'es_CO',
            'auth' => array(
                'login' => '6dd490faf9cb87a9862245da41170ff2',
                'seed' => $seed,
                'nonce' => $nonceBase64,
                'tranKey' => $tranKey,
			),
			'payment' => array(
				'reference' => $pedido->id,
				'description' => $pedido->producto->nombre_producto,
				'amount' => array (
					'currency'=> 'COP',
					'total'=> $pedido->producto->valor_producto,
				)
			),
			'buyer' => array(
				'name' => $pedido->customer_name,
				'email' => $pedido->customer_email,
				'mobile' => $pedido->customer_mobile,
				
			),
			'expiration' => $fecha_expiration_format,  
			'returnUrl' =>  env('APP_URL') . 'resultpedido/' . $pedido->id,
			'ipAddress' => '127.0.0.1',
			'userAgent' => 'PlacetoPay Sandbox',
        ]);
        $response_array = $response->json();
		$request_id = $response_array['requestId'];
        $url_client = $response_array['processUrl'];
		$pedido->requestId_placetopay = $request_id;
		$pedido->save();
		if ($request->forma_pago == 'placetopay') {
			return view('pedidos.creadoplacetopay', [
				'pedido' => $pedido,
				'url_client' => $url_client,								
			]);
		}
	}

	public function resultpedido($id) {
		$pedido = Pedido::find($id);
		$seed = date('c');
		if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
        $nonceBase64 = base64_encode($nonce);
        $secretKey = '024h1IlD';
		$tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));
		$response_result = Http::post('https://dev.placetopay.com/redirection/api/session/' . $pedido->requestId_placetopay, [
            'locale'=> 'es_CO',
            'auth' => array(
                'login' => '6dd490faf9cb87a9862245da41170ff2',
                'seed' => $seed,
                'nonce' => $nonceBase64,
                'tranKey' => $tranKey,
			),
		]);
		$response_array_result = $response_result->json();
		if ($response_array_result['status']['status'] == 'APPROVED') {
			$pedido->status = 'PAYED';
		}elseif($response_array_result['status']['status'] == 'REJECTED') {
			$pedido->status = 'REJECTED';
		}
		$pedido->save();		
		return view('pedidos.resultpedido', [
			'pedido' => $pedido,
		]);
	}

	public function pagopedido($id) {
		$pedido = Pedido::find($id);

		$seed = date('c');
		$fecha_expiration = strtotime( '+10 minute' , strtotime ($seed));
		$fecha_expiration_format = date ('c', $fecha_expiration);
		if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
        $nonceBase64 = base64_encode($nonce);
        $secretKey = '024h1IlD';
        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));
        $response = Http::post('https://dev.placetopay.com/redirection/api/session/', [
            'locale'=> 'es_CO',
            'auth' => array(
                'login' => '6dd490faf9cb87a9862245da41170ff2',
                'seed' => $seed,
                'nonce' => $nonceBase64,
                'tranKey' => $tranKey,
			),
			'payment' => array(
				'reference' => $pedido->id,
				'description' => $pedido->producto->nombre_producto,
				'amount' => array (
					'currency'=> 'COP',
					'total'=> $pedido->producto->valor_producto,
				)
			),
			'buyer' => array(
				'name' => $pedido->customer_name,
				'email' => $pedido->customer_email,
				'mobile' => $pedido->customer_mobile,
				
			),
			'expiration' => $fecha_expiration_format,  
			'returnUrl' =>  env('APP_URL') . 'resultpedido/' . $pedido->id,
			'ipAddress' => '127.0.0.1',
			'userAgent' => 'PlacetoPay Sandbox',
        ]);
        $response_array = $response->json();
		$request_id = $response_array['requestId'];
        $url_client = $response_array['processUrl'];
		$pedido->requestId_placetopay = $request_id;
		$pedido->save();
		return view('pedidos.creadoplacetopay', [
			'pedido' => $pedido,
			'url_client' => $url_client,								
		]);
	}
}
