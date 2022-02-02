@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12 container-titulo">
    <a href="/administracion/productosexistentes" class="btn btn-success btn-lg">Productos Activos</a>
    <a href="/administracion/productos" class="btn btn-general btn-lg">Crear Nuevo</a>
  </div>
</div>

<div class="row text-center">
	<div class="col-12 container-titulo">
		<h1 class="titulo-principal">Productos Desactivos</h1>
	</div>
</div>

    <table class="table">
      <thead class="header-tabla">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Producto</th>
          <th scope="col">Talla</th>
          <th scope="col">Marca</th>
          <th scope="col">Cantidades</th>
          <th scope="col">Valor producto</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody class="cuerpo-tabla">
          @foreach ($productos as $producto)
            <tr>
              <th class="fila-tabla" scope="row">{{ $producto->id }}</th>
                <td class="fila-tabla">{{ $producto->nombre_producto }}</td>
                <td class="fila-tabla">{{ $producto->talla_producto }}</td>
                <td class="fila-tabla">{{ $producto->marca->nombre_marca }}</td>
                <td class="fila-tabla">{{ $producto->cantidad_producto }}</td>
              <td class="fila-tabla">$@php echo number_format($producto->valor_producto); @endphp</td>
              <td class="fila-tabla"><a href="/administracion/editarproducto/{{ $producto->id }}" class="btn btn-general" her>Editar</a></td>
            </tr>
        @endforeach

      </tbody>
    </table>
@endsection