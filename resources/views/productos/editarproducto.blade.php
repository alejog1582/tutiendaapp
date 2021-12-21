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
				<hr><hr>
				<label for="categoria_producto">Categoria de Producto</label>
				<select required onchange="getval(this)" id="categoria_producto" class="form-control @if ($errors->has('categoria_producto')) is-invalid	@endif" name="categoria_producto">
					@if ($producto->categoria_producto == 'anchetas')
						<option selected value="anchetas">Anchetas</option>
  						<option value="cumpleanos">Cumpleaños</option>
  						<option value="aniversario">Aniversario</option>
  						<option value="picnic">Picnic</option>
  						<option value="endulzadas">Endulza tu Dia</option>
  						<option value="light">Regalos Light</option>  						
					@endif
					@if ($producto->categoria_producto == 'cumpleanos')
						<option value="anchetas">Anchetas</option>
  						<option selected value="cumpleanos">Cumpleaños</option>
  						<option value="aniversario">Aniversario</option>
  						<option value="picnic">Picnic</option>
  						<option value="endulzadas">Endulza tu Dia</option>
  						<option value="light">Regalos Light</option>  						
					@endif
					@if ($producto->categoria_producto == 'aniversario')
						<option value="anchetas">Anchetas</option>
  						<option value="cumpleanos">Cumpleaños</option>
  						<option selected value="aniversario">Aniversario</option>
  						<option value="picnic">Picnic</option>
  						<option value="endulzadas">Endulza tu Dia</option>
  						<option value="light">Regalos Light</option>  						
					@endif
					@if ($producto->categoria_producto == 'picnic')
						<option value="anchetas">Anchetas</option>
  						<option value="cumpleanos">Cumpleaños</option>
  						<option value="aniversario">Aniversario</option>
  						<option selected value="picnic">Picnic</option>
  						<option value="endulzadas">Endulza tu Dia</option>
  						<option value="light">Regalos Light</option>  						
					@endif
					@if ($producto->categoria_producto == 'endulzadas')
						<option value="anchetas">Anchetas</option>
  						<option value="cumpleanos">Cumpleaños</option>
  						<option value="aniversario">Aniversario</option>
  						<option value="picnic">Picnic</option>
  						<option selected value="endulzadas">Endulza tu Dia</option>
  						<option value="light">Regalos Light</option>  						
					@endif
					@if ($producto->categoria_producto == 'light')
						<option value="anchetas">Anchetas</option>
  						<option value="cumpleanos">Cumpleaños</option>
  						<option value="aniversario">Aniversario</option>
  						<option value="picnic">Picnic</option>
  						<option value="endulzadas">Endulza tu Dia</option>
  						<option selected value="light">Regalos Light</option>  						
					@endif					
				</select>				
                <hr><hr>
				<label for="valor_producto">Valor de Producto</label>
				<input type="number" value="{{ $producto->valor_producto }}" id="valor_producto" name="valor_producto" class="form-control">
				<hr><hr>
				<input type="submit" class="btn btn-general" name="" value="Actualizar">
			</div>
		</form>
	</div>
</div>
@endsection