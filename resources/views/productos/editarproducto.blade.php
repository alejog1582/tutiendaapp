@extends('layouts.app')

@section('content')
<div class="row text-center">
	<div class="col-12 container-titulo">
		<h2 class="titulo-principal">Editar Producto</h2>
	</div>
</div>
<div class="row">
	<div class="col-12 container-form">
		<form action="/administracion/saveproducto" method="post">
			{{ csrf_field() }}
			<div class="form-group" >
				<label for="nombre_producto">Nombre de Producto</label>
				<input type="hidden" name="id_producto" value="{{ $producto->id }}">
				<input required type="text" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}" class="form-control">
				<hr><hr>
				<label for="estado_producto">Estado del Producto</label>
				<select required id="estado_producto" class="form-control" name="estado_producto">
					@if ($producto->estado == "activo")
						<option value="activo">Activo</option>
						<option value="desactivo">Desactivo</option>
					@endif
					@if ($producto->estado == "desactivo")
						<option value="desactivo">Desactivo</option>
						<option value="activo">Activo</option>
					@endif
				</select>
                <hr><hr>
				<label for="descripcion_producto">Descripcion de Producto</label>
				<textarea required name="descripcion_producto" id="descripcion_producto" class="form-control" rows="12">{{ $producto->descripcion_producto }}</textarea>
				<hr>
				<label for="marca_producto">Marca de Producto</label>
				<select required id="marca_producto" class="form-control @if ($errors->has('marca_producto')) is-invalid	@endif" name="marca_producto">
					<option selected disabled value="">Elige una Marca</option>
  					@foreach ($marcas as $marca)
					  	@if ($marca->id == $producto->id_marca_producto)
						  	<option selected value="{{$marca->id}}">{{$marca->nombre_marca}}</option>						
						@else  
  							<option value="{{$marca->id}}">{{$marca->nombre_marca}}</option>
						@endif
					@endforeach  					
				</select>
				@if ($errors->has('marca_producto'))
					@foreach ($errors->get('marca_producto') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
				<hr>
				<label for="talla_producto">Categoria de Producto</label>
				<select required id="talla_producto" class="form-control @if ($errors->has('talla_producto')) is-invalid	@endif" name="talla_producto">
					@if ($producto->talla_producto == 's')
						<option selected value="s">S</option>
  						<option value="m">M</option>
  						<option value="l">L</option>  						 						
					@endif
					@if ($producto->talla_producto == 'm')
						<option selected value="m">M</option>
						<option value="s">S</option>
  						<option value="l">L</option>  						 						
					@endif
					@if ($producto->talla_producto == 'l')
						<option selected value="l">L</option>  						 						
						<option value="s">S</option>
						<option value="m">M</option>
					@endif										
				</select>				
                <hr>
				<label for="cantidad_producto">Cantidad de Producto</label>
				<input type="number" value="{{ $producto->cantidad_producto }}" id="cantidad_producto" name="cantidad_producto" class="form-control">
				<hr>
				<label for="valor_producto">Valor de Producto</label>
				<input type="number" value="{{ $producto->valor_producto }}" id="valor_producto" name="valor_producto" class="form-control">
				<hr><hr>
				<input type="submit" class="btn btn-general" name="" value="Actualizar">
			</div>
		</form>
	</div>
</div>
@endsection