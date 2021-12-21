@extends('layouts.app')
@section('content')
<div class="container">
    @if ($user->email == 'cliente_evertec@example.com')
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <div class="card text-center h-100">
                    <a href="/administracion/productos">
                        <div class="card-block"style="color: #0b1d2f">
                            <h2><i class="fas fa-gift fa-3x" style="color: #6610f2"></i></h2>
                            <h4 class="card-title">Productos</h4>
                        </div>                                
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center h-100">
                    <a href="/administracion/pedidos">
                        <div class="card-block"style="color: #0b1d2f">
                            <h2><i class="far fa-file-alt fa-3x" style="color: #6610f2"></i></h2>
                            <h4 class="card-title">¨Pedidos</h4>
                        </div>                                
                    </a>
                </div>
            </div>
        </div>
        <br><br>
    @else
        <div class="row justify-content-center">
            <div class="col-12 container-titulo">
                <div class="card-header header-tabla-contraste text-center titulos-auth">Bienvenido a Tu Cuenta {{ $user->name }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif                    
                        <div class="row">
                            <div class="col-12 container-titulo">
                                <h2 class="text-center titulo-principal">Mis Pedidos</h2>
                            </div>
                        </div>
                        @if ($solicitud == false)
                            <div class="alert alert-danger">
                                {{ $user->name }} No tienes pedidos existentes
                            </div>
                        @endif

                        <div class="accordion" id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                    <button class="btn btn-link titulo-categoria-personalizado" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>Pedidos Creados</span>
                                    </button>
                                    </h5>
                                </div>                        
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Valor</th>
                                                <th scope="col">Pagar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pedidos as $pedido)
                                                @if ($pedido->customer_email == $user->email)
                                                    @if ($pedido->status == 'CREATED' )
                                                        <tr>
                                                            <td>{{$pedido->id}}</td>
                                                            <td>{{$pedido->created_at}}</td>
                                                            <td>{{$pedido->producto->nombre_producto}}</td>
                                                            <td>{{$pedido->valor_pedido}}</td>
                                                            <td><a href="/pagopedido/{{$pedido->id}}" class="btn btn-general">Pagar con PlacetoPay</a></td>
                                                        </tr>                                            
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed titulo-categoria-personalizado" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Pedidos Aprobados
                                </button>
                            </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Producto</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pedidos as $pedido)
                                                    @if ($pedido->customer_email == $user->email)
                                                        @if ($pedido->status == 'PAYED' )
                                                            <tr>
                                                                <td>{{$pedido->id}}</td>
                                                                <td>{{$pedido->created_at}}</td>
                                                                <td>{{$pedido->producto->nombre_producto}}</td>
                                                                <td>{{$pedido->valor_pedido}}</td>
                                                                <td>{{$pedido->status}}</td>
                                                            </tr>                                            
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed titulo-categoria-personalizado" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Pedidos Rechazados
                                </button>
                            </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Producto</th>
                                                    <th scope="col">Valor</th>
                                                    <th scope="col">Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pedidos as $pedido)
                                                    @if ($pedido->customer_email == $user->email)
                                                        @if ($pedido->status == 'REJECTED' )
                                                            <tr>
                                                                <td>{{$pedido->id}}</td>
                                                                <td>{{$pedido->created_at}}</td>
                                                                <td>{{$pedido->producto->nombre_producto}}</td>
                                                                <td>{{$pedido->valor_pedido}}</td>
                                                                <td>{{$pedido->status}}</td>
                                                            </tr>                                            
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>                                  
                    </div>
                </div>
        </div>
    @endif
</div>
@endsection
