@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-12 container-titulo">
		<a href="/administracion/productosexistentes" class="btn btn-success btn-lg">Productos Activos</a>
		<a href="/administracion/productosdesactivados" class="btn btn-danger btn-lg">Productos Desactivos</a>
		<a href="/administracion/marcas" class="btn btn-secondary btn-lg">Administrar Marcas</a>
	</div>
</div>
<div class="row">
	<div class="col-12 container-titulo">
		<h2 class="text-center titulo-principal">Crear Nuevo Producto</h2>
	</div>
</div>
@if ($reg_marcas == false)
	<div class="row">
		<div class="col-12">
			<div class="alert alert-danger" role="alert">
				No existen marcas creadas. Por favor ingrese a <b>Administrar Marcas</b> para crear su primera marca.
			  </div>
		</div>
	</div>
@endif
<div class="row">
	<div class="col-12 container-form">
		<form action="/administracion/productos/create" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group" >
				<label for="marca_producto">Marca de Producto</label>
				<select required id="marca_producto" class="form-control @if ($errors->has('marca_producto')) is-invalid	@endif" name="marca_producto">
					<option selected disabled value="">Elige una Marca</option>
  					@foreach ($marcas as $marca)
  						<option value="{{$marca->id}}">{{$marca->nombre_marca}}</option>
					@endforeach  					
				</select>
				@if ($errors->has('marca_producto'))
					@foreach ($errors->get('marca_producto') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
				<hr>
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
				<textarea required name="descripcion_producto" id="descripcion_producto" class="form-control @if ($errors->has('descripcion_producto')) is-invalid	@endif" rows="8"></textarea>
				@if ($errors->has('descripcion_producto'))
					@foreach ($errors->get('descripcion_producto') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
                <hr><hr>
				<label for="talla_producto">Talla de Producto</label>
				<select required id="talla_producto" class="form-control @if ($errors->has('talla_producto')) is-invalid	@endif" name="talla_producto">
  					<option value="">Elige una Talla</option>
  					<option value="s">S</option>
  					<option value="m">M</option>
  					<option value="l">L</option>  					
  				</select>
				@if ($errors->has('talla_producto'))
					@foreach ($errors->get('talla_producto') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
                <hr>
				<label for="cantidad_producto">Cantidad de Producto</label>
				<input required type="number" id="cantidad_producto" name="cantidad_producto" class="form-control @if ($errors->has('cantidad_producto')) is-invalid	@endif">
				@if ($errors->has('cantidad_producto'))
					@foreach ($errors->get('cantidad_producto') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
				<hr>
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