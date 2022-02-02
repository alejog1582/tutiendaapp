@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 container-titulo">
      <a href="/administracion/productos" class="btn btn-danger btn-lg">Regresar a Productos</a>
      <a href="/administracion/marcas/new" class="btn btn-general btn-lg">Crear Nueva Marca</a>
    </div>
</div>

<div class="row text-center">
	<div class="col-12 container-titulo">
		<h1 class="titulo-principal">Administración de Marcas</h1>
	</div>
</div>

    <table class="table">
      <thead class="header-tabla">
        <tr>
          <th scope="col">Nombre de Marca</th>
          <th scope="col">Referencia</th>
          <th scope="col">Estado</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody class="cuerpo-tabla">
          @foreach ($marcas as $marca)
            <tr>
            	<td class="fila-tabla">{{ $marca->nombre_marca }}</td>
              	<td class="fila-tabla">{{ $marca->referencia_marca }}</td>
              	<td class="fila-tabla">{{ $marca->estado }}</td>
              	<td class="fila-tabla"><a href="/administracion/editarmarca/{{ $marca->id }}" class="btn btn-general" her>Editar</a></td>
            </tr>
        @endforeach

      </tbody>
    </table>
@endsection