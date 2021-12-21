<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Models\Pedido;



class HomeController extends Controller
{
    public function index() {
		$user = \Auth::user();
		$pedidos = Pedido::all();
		$promocion = false;
		$solicitud = false;
		$personalizable = false;
		
		foreach ($pedidos as $pedido) {
			if ($pedido->customer_email == $user->email) {
				$solicitud = true;
			}
		}
		
        return view('dashboard', [
			'user' => $user,
			'pedidos' => $pedidos,
            'solicitud' => $solicitud,				
		]);
	}
}
