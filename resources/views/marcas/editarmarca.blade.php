@extends('layouts.app')

@section('content')
<div class="row text-center">
	<div class="col-12 container-titulo">
		<h2 class="titulo-principal">Editar Producto</h2>
	</div>
</div>
<div class="row">
	<div class="col-12 container-form">
		<form action="/administracion/savemarca" method="post">
			{{ csrf_field() }}
			<div class="form-group" >
				<label for="nombre_marca">Nombre de Marca</label>
				<input type="hidden" name="id_marca" value="{{ $marca->id }}">
				<input required type="text" id="nombre_marca" name="nombre_marca" value="{{ $marca->nombre_marca }}" class="form-control">
				<hr>
				<label for="estado_marca">Estado del Producto</label>
				<select required id="estado_marca" class="form-control" name="estado_marca">
					@if ($marca->estado == "activo")
						<option value="activo">Activo</option>
						<option value="desactivo">Desactivo</option>
					@endif
					@if ($marca->estado == "desactivo")
						<option value="desactivo">Desactivo</option>
						<option value="activo">Activo</option>
					@endif
				</select>
                <hr>
				<label for="referencia_marca">Nombre de Marca</label>
				<input required type="text" id="referencia_marca" name="referencia_marca" value="{{ $marca->referencia_marca }}" class="form-control">
				<hr>
				<input type="submit" class="btn btn-general" name="" value="Actualizar">
			</div>
		</form>
	</div>
</div>
@endsection