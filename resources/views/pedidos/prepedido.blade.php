@extends('layouts.app')

@section('content')
<div class="row text-center">
	<div class="col-12 container-titulo">
		<h2 class="titulo-principal">Producto Seleccionado:</h2>
	</div>
</div>
<div class="row">
	<div class="col-12 col-md-4">
		<div class="card text-center">
		  <div class="card-header">
		    <img width="100%" src="{{ $producto->imagen }}">
		  </div>
		  <div class="card-body">
		    <h3 class="card-title titulo-producto">{{ $producto->nombre_producto }}</h3>
		    <p class="card-text">{{ $producto->descripcion_producto }}</p>
		  </div>
		  <div class="card-footer text-muted">
		    <b>Valor: $ @php echo number_format($producto->valor_producto); @endphp</b>
		  </div>
		</div>
	</div>
	<div class="col-12 col-md-8 text-center">
		<h3 class="subtitulo">Medios de Pago</h3>
		<div class="row">
			<div class="col-sm-12">
				<img src="https://static.placetopay.com/placetopay-logo.svg" class="attachment-0x0 size-0x0" alt="" loading="lazy">
                <br><br>
				<p>*El pago del pedido se debe realizar por medio de la plataforma PlacetoPay, garantizando que tus datos e información financiera siempre estén protegidos. <hr>	</p>
			</div>			
		</div>
	</div>
</div>

<div class="row text-center">
	<div class="col-12 container-titulo">
		<h2 class="titulo-principal">Datos de envio</h2>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<form action="/pedido" method="post">
			{{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="hidden" class="form-control" name="id_producto" value="{{ $producto->id }}">
			        <input type="hidden" class="form-control" name="nombre_producto" value="{{ $producto->nombre_producto }}">
			        <input type="hidden" class="form-control" name="valor_producto" value="{{ $producto->valor_producto }}">
			        <label for="nombre_contacto">Nombre Cliente</label>
                    <input required type="text" name="nombre_contacto" class="form-control" id="nombre_contacto" placeholder="Ana Lozano">                  
                </div>
                <div class="form-group col-md-4">
                    <label for="celular_contacto">Celular Cliente</label>
                    <input required type="text" name="celular_contacto" class="form-control" id="nombre_contacto" id="celular_contacto" placeholder="3213857042">                  
                </div>
                <div class="form-group col-md-4">
                    <label for="email_contacto">Email Cliente</label>
                    <input required type="email" name="email_contacto" class="form-control" id="nombre_contacto" id="email_contacto" placeholder="example@gmail.com">                  
                </div>
            </div>
		    <div class="form-row">
			    <div class="form-group col-md-4">
			        <label for="direccion_envio">Direccion de Envio</label>
			        <input required type="text" name="direccion_envio" class="form-control" id="direccion_envio" placeholder="Calle 181c # 9 30">
			    </div>
			    <div class="form-group col-md-4">
			        <label for="info_adicional_direccion">Apto/Casa/Oficina</label>
			        <input type="text" name="info_adicional_direccion" class="form-control @if ($errors->has('info_adicional_direccion')) is-invalid	@endif" id="info_adicional_direccion" placeholder="Oficina 503">			    
			    </div>
			    <div class="form-group col-md-4">
			        <label for="barrio">Barrio</label>
			        <input required type="text" name="barrio" class="form-control" id="barrio" placeholder="Cedritos">			        
			    </div>
		    </div>
		  	<div class="form-row">
			    <div class="form-group col-md-6">
			        <label for="fecha_entrega">Fecha de Entrega</label>
			        <input required type="date" name="fecha_entrega" class="form-control" id="fecha_entrega" placeholder="Cedritos">			    
			  </div>
			  <div class="form-group col-md-6">
			        <label for="hora_entrega">Hora de Entrega</label>
			        <input required type="time" name="hora_entrega" class="form-control" id="hora_entrega" placeholder="7:00 am">			    
			  </div>
			</div>
		    <div class="form-row">
			  	<div class="form-group col-md-4">
			        <label for="forma_pago">Forma de Pago</label>
			        <select id="forma_pago" name="forma_pago" class="form-control">
			            <option selected value="placetopay">PlacetoPay</option>
			        </select>			      
			    </div>			    
			</div>
		    <div class="form-group">
		        <div class="form-check">
		            <input required name="privacidad" class="form-check-input" type="checkbox" id="privacidad">
		            <label class="form-check-label" for="privacidad">
		      	        He leído y acepto la <a href="#">Politica de Privacidad</a>
		            </label>		      
		        </div>
		    </div>
		    <div class="form-row">
		  		<button type="submit" class="btn btn-lg btn-general">Hacer Pedido</button>
		    </div>
		</form>
	</div>
</div>
<br>
@endsection()