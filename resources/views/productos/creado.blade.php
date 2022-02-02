@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-12 container-titulo">
		<div class="card">
		  <div class="card-header text-center header-tarjeta">
		    Producto Creado Con Exito
		  </div>
		  <div class="card-body">
		    <p class="card-text container-texto">El Producto se visualizara en la marca seleccionada en la creacion del mismo.</p>
		    <a href="/administracion/productos" class="btn btn-success btn-lg">Regresar</a>
		  </div>
		</div>
	</div>
</div>
@endsection