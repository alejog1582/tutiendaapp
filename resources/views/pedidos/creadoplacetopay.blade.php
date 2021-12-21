@extends('layouts.app')

@section('content')
<div class="row text-center" >
	<div class="col-12 container-titulo">
		<div class="card">
		  <div class="card-header header-tarjeta-confirmacion">
		    Pedido Realizado Con Exito
		  </div>
		  <div class="card-body">
		    <h3 class="card-title">El Numero De Pedido Es: <span style="color: red"><b>	{{  $pedido->id_unico_pedido }}</b></span></h3>
		    <p class="card-text texto">A continuacion encontraras el boton de pagos Pay U:</p>
		    <p class="card-text"></p>
			<a href="{{$url_client}}" class="btn btn-general">Pagar con PlacetoPay</a>
			 <p><small>*Los pedidos sin paago no se procesaran</small></p>		   
		  </div>
		</div>
	</div>
</div>
@endsection