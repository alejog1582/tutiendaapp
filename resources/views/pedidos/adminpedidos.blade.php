@extends('layouts.app')

@section('content')
@if ($estado == 'CREATED')
<div class="row">
  <div class="col-12 container-titulo">
      <a href="/administracion/pedidos/procesado" class="btn btn-warning btn-lg">Pagados</a>
      <a href="/administracion/pedidos/rechazados" class="btn btn-danger btn-lg">Rechazados</a>      
  </div>
</div>
<div class="row text-center">
  <div class="col-12 container-titulo">
    <h1 class="titulo-principal">Pedidos Creados</h1>
  </div>
</div>
@endif
@if ($estado == 'PAYED')
<div class="row">
  <div class="col-12 container-titulo">
    <a href="/administracion/pedidos" class="btn btn-success btn-lg">Creados</a>
    <a href="/administracion/pedidos/rechazados" class="btn btn-danger btn-lg">Rechazados</a>    
  </div>
</div>
<div class="row text-center">
  <div class="col-12 container-titulo">
    <h1 class="titulo-principal">Pedidos Pagados con Exito</h1>
  </div>
</div>
@endif
@if ($estado == 'REJECTED')
<div class="row">
  <div class="col-12 container-titulo">
    <a href="/administracion/pedidos" class="btn btn-success btn-lg">Creados</a>
    <a href="/administracion/pedidos/procesado" class="btn btn-warning btn-lg">Pagados</a>    
  </div>
</div>
<div class="row text-center">
  <div class="col-12 container-titulo">
    <h1 class="titulo-principal">Pedidos Rechazados por Pago</h1>
  </div>
</div>
@endif
<div class="row">
  @foreach ($pedidos as $pedido)
    <div class="col-md-4 col-12">
      <div class="card text-center">
        <div class="card-header">
          Pedido Id: {{ $pedido->id }}
        </div>
        <div class="card-body">
          <h3 class="card-title titulo-producto">{{ $pedido->nombre_producto }}</h3>
          <p class="card-text"><b>Cantidades: </b> {{ $pedido->cantidades }}<br><b>Direccion de envio: </b>{{ $pedido->direccion_envio }} {{ $pedido->apto_casa_oficina }}<br><b>Fecha de Entrega: </b>{{ $pedido->fecha_entrega }} {{ $pedido->hora_entrega }}<br><b>Contacto: </b> {{ $pedido->customer_name }} | {{ $pedido->customer_mobile }} | {{ $pedido->customer_email }}<br><b>Medio de Pago: </b>{{ $pedido->medio_pago }}<br><b>Valor Producto:</b>$@php echo number_format($pedido->producto->valor_producto); @endphp<br><b>Valor Pedido :</b>@php echo number_format($pedido->valor_pedido); @endphp</p>
        </div>        
      </div>
    </div>
  @endforeach

</div>
@endsection