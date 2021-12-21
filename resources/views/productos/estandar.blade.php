@extends('layouts.app')
@section('content')
<div class="row text-center">
	<div class="col-12 container-titulo">
		@if ($categoria == 'anchetas')
			<h2 class="titulo-principal">Anchetas</h2>
		@endif
		@if ($categoria == 'cumpleanos')
			<h2 class="titulo-principal">Cumpleaños</h2>
		@endif
		@if ($categoria == 'aniversario')
			<h2 class="titulo-principal">Aniversario</h2>
		@endif
		@if ($categoria == 'picnic')
			<h2 class="titulo-principal">Picnic</h2>
		@endif
		@if ($categoria == 'endulzadas')
			<h2 class="titulo-principal">Endulza tu Dia</h2>
		@endif
		@if ($categoria == 'light')
			<h2 class="titulo-principal">Light</h2>
		@endif
		@if ($categoria == 'temporada')
			<h2 class="titulo-principal">Dia del Padre</h2>
		@endif
	</div>
</div>
<div class="row text-center">
	<div class="col-12">
		@if ($categoria == 'anchetas')
			<div class="card">
		      <div class="card-body texto">
		        Las anchetas son una deliciosa combinación de diferentes alimentos para complacer los gustos particulares de todas las personas, por eso encontrarás los mejores productos ideales para cada ocasión, selecciona el de tu preferencia.
		      </div>
		    </div>
		@endif
		@if ($categoria == 'cumpleanos')
			<div class="card">
		      <div class="card-body texto">
		        Para esa fecha tan especial regalos de cumpleaños personalizados e inesperados son perfectos para sorprender en esta ocasión y siempre ser recordado.
		      </div>
		    </div>
		@endif
		@if ($categoria == 'aniversario')
			<div class="card">
		      <div class="card-body texto">
		        Busca tus productos favoritos en nuestras categorias. Y agregalos al Carrito de Compras. <br> <br>
		        Una vez finalizada la seleccion da click en <b>Finalizar compra</b> que se encuentra En Mi Carrito de Compras y deligencia el formulario de tu pedido.
		      </div>
		    </div>
		@endif
		@if ($categoria == 'picnic')
			<div class="card">
		      <div class="card-body texto">
		        Por qué no sorprender de una manera única o disfrutar de ese día juntos haciendo la vida mas dulce y celebrar de una manera única al aire libre.
		      </div>
		    </div>
		@endif
		@if ($categoria == 'endulzadas')
			<div class="card">
		      <div class="card-body texto">
		        Por qué no se requiere una fecha especial y todos los días son especiales, comparte con esa persona especial y endulza tu día.
		      </div>
		    </div>
		@endif
		@if ($categoria == 'light')
			<div class="card">
		      <div class="card-body texto">
		        Con esta opción podrás sorprender y disfrutarlas ya sea como desayuno, merienda o en cualquier otro momento del día.
		      </div>
		    </div>
		@endif
		@if ($categoria == 'temporada')
			<div class="card">
		      <div class="card-body texto">
		        Busca tus productos favoritos en nuestras categorias. Y agregalos al Carrito de Compras. <br> <br>
		        Una vez finalizada la seleccion da click en <b>Finalizar compra</b> que se encuentra En Mi Carrito de Compras y deligencia el formulario de tu pedido.
		      </div>
		    </div>
		@endif
	</div>
</div>
<div class="row">
	@foreach ($productos as $producto)
	   	@if ($producto->estado == 'activo')
       		<div class="col-12 col-md-4">
				<div class="card text-center">
					<div class="card-header">
				    	<img class="card-img-top" src="{{ $producto->imagen }}" alt="Card image cap">
				  	</div>
				  	<div class="card-body">
				    	<h3 class="card-title titulo-producto">{{ $producto->nombre_producto }}</h3>
				    	<p class="card-text">@php echo nl2br($producto->descripcion_producto); @endphp</p>
				    	<a href="/prepedido/ {{ $producto->id }}/" class="btn btn-general">Hacer Pedido</a>
				  	</div>
				  	<div class="card-footer text-muted"><b>Valor: $ @php echo number_format($producto->valor_producto); @endphp</b>
				  	</div>
				</div>
       		</div>
        @endif
	@endforeach
</div>
@endsection