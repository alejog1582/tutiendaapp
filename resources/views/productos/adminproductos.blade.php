@extends('layouts.app')
<script type="text/javascript">
	function getval(sel){
	$tipo = sel.value;
	if ($tipo == 'personalizado'){
	$("select[name=subcategoria_producto]").removeAttr('disabled');
	}else{
	$("select[name=subcategoria_producto]").prop('disabled', true);
	}
	};

</script>

@section('content')
<div class="row">
	<div class="col-12 container-titulo">
		<a href="/administracion/productosexistentes" class="btn btn-success btn-lg">Productos Activos</a>
		<a href="/administracion/productosdesactivados" class="btn btn-danger btn-lg">Productos Desactivos</a>
	</div>
</div>
<div class="row">
	<div class="col-12 container-titulo">
		<h2 class="text-center titulo-principal">Crear Nuevo Producto</h2>
	</div>
</div>
<div class="row">
	<div class="col-12 container-form">
		<form action="/administracion/productos/create" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group" >
				<label for="nombre_producto">Nombre de Producto</label>
				<input type="hidden" name="estado_producto" value="activo">
				<input required type="text" id="nombre_producto" name="nombre_producto" class="form-control  @if ($errors->has('nombre_producto')) is-invalid	@endif">
				@if ($errors->has('nombre_producto'))
					@foreach ($errors->get('nombre_producto') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
                <hr><hr>
				<label for="imagen">Imagen Producto</label>
				<input required type="file" id="imagen" name="imagen" class="form-control-file">
                <hr><hr>
				<label for="descripcion_producto">Descripcion de Producto</label>
				<textarea required name="descripcion_producto" id="descripcion_producto" class="form-control @if ($errors->has('descripcion_producto')) is-invalid	@endif" rows="12"></textarea>
				@if ($errors->has('descripcion_producto'))
					@foreach ($errors->get('descripcion_producto') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
                <hr><hr>
				<label for="categoria_producto">Categoria de Producto</label>
				<select required onchange="getval(this)" id="categoria_producto" class="form-control @if ($errors->has('categoria_producto')) is-invalid	@endif" name="categoria_producto">
  					<option value="">Elige una Categoria</option>
  					<option value="cumpleanos">Cumpleaños</option>
  					<option value="aniversario">Aniversario</option>
  					<option value="light">Regalos Light</option>  					
  					<option value="picnic">Picnic</option>
  					<option value="endulzadas">Endulza tu Dia</option>
  					<option value="anchetas">Anchetas</option>
				</select>
				@if ($errors->has('categoria_producto'))
					@foreach ($errors->get('categoria_producto') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
                <hr><hr>
				<label for="valor_producto">Valor de Producto</label>
				<input required type="number" id="valor_producto" name="valor_producto" class="form-control @if ($errors->has('valor_producto')) is-invalid	@endif">
				@if ($errors->has('valor_producto'))
					@foreach ($errors->get('valor_producto') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
				<hr><hr>
				<input type="submit" class="btn btn-general" name="" value="Crear">
			</div>
		</form>
	</div>
</div>
@endsection