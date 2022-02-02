@extends('layouts.app')
@section('content')
<div class="row text-center">
	<div class="col-12 container-titulo">
		<h2 class="titulo-principal">Productos Marca: {{$categoria}}</h2>		
	</div>
</div>
@if ($reg_productos == false)
    <div class="row">
      <div class="col-12">
        <div class="alert alert-danger" role="alert">
          No existen productos para la marcas <b>{{$categoria}}</b>.
          </div>
      </div>
    </div>
@else
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
						<hr>
				    	<p class="card-text"> Descripcion: @php echo nl2br($producto->descripcion_producto); @endphp</p>
						<hr>
				    	<p class="card-text">Talla: @php echo nl2br($producto->talla_producto); @endphp</p>
						<hr>
				    	<p class="card-text">Inventario: @php echo nl2br($producto->cantidad_producto); @endphp</p>

										    	<a href="/prepedido/ {{ $producto->id }}/" class="btn btn-general">Hacer Pedido</a>
				  	</div>
				  	<div class="card-footer text-muted"><b>Valor: $ @php echo number_format($producto->valor_producto); @endphp</b>
				  	</div>
				</div>
       		</div>
        @endif
	@endforeach
</div>
@endif
@endsection