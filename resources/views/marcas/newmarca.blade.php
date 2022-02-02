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
		<a href="/administracion/marcas" class="btn btn-secondary btn-lg">Regresar</a>		
	</div>
</div>
<div class="row">
	<div class="col-12 container-titulo">
		<h2 class="text-center titulo-principal">Crear Nueva Marca</h2>
	</div>
</div>
<div class="row">
	<div class="col-12 container-form">
		<form action="/administracion/marcas/newsave" method="post">
			{{ csrf_field() }}
			<div class="form-group" >
				<label for="nombre_marca">Nombre de Marca</label>
				<input type="hidden" name="estado_marca" value="activo">
				<input type="text" id="nombre_marca" name="nombre_marca" class="form-control  @if ($errors->has('nombre_marca')) is-invalid	@endif">
				@if ($errors->has('nombre_marca'))
					@foreach ($errors->get('nombre_marca') as $error)
						<div class="invalid-feedback">{{ $error }}</div>
					@endforeach
				@endif
                <hr>
				<label for="referencia_marca">Referencia de Marca</label>
				<input type="number" id="referencia_marca" name="referencia_marca" class="form-control @if ($errors->has('referencia_marca')) is-invalid	@endif">
				@if ($errors->has('referencia_marca'))
					@foreach ($errors->get('referencia_marca') as $error)
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