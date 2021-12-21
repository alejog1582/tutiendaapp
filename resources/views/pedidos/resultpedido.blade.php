@extends('layouts.app')

@section('content')
<div class="row text-center" >
	<div class="col-12 container-titulo">
		<div class="card">
		    <div class="card-header header-tarjeta-confirmacion">
                @if ($pedido->status == "PAYED")
                    Pago Recibido Con Exito
                    @elseif($pedido->status == "REJECTED")
                    El pago no ha sido Exitoso
                @endif
		    </div>
		  <div class="card-body">
			@if ($pedido->status == "PAYED")
				<p class="card-text texto">El pago ha sido recibido con exito para el producto: <b>{{$pedido->producto->nombre_producto}}</b>, el producto se despachara el <b>{{$pedido->fecha_entrega}}</b>.</p>
				<a href="/" class="btn btn-general">Aceptar</a>
			@elseif($pedido->status == "REJECTED")
                <p class="card-text texto">El pago del producto: <b>{{$pedido->producto->nombre_producto}}, NO</b>  ha sido exitoso. Lo invitamos a validar con su entidad financiera.</b>.</p>
				<a href="/pagopedido/{{$pedido->id}}" class="btn btn-general">Reintentar Pago</a>
				<a href="/" class="btn btn-general">Cancelar</a>
            @endif
        </div>
		</div>
	</div>
</div>
@endsection