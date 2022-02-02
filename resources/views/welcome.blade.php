@extends('layouts.app')

@section('content')
  <div class="row container-titulo">
    <div class="col-12">
      <h1 class="text-center titulo-principal">Catalogo</h1>
      <h2>Selecciona tu marca</h2>
    </div>
  </div>    
  <div class="row">
    @if ($reg_marcas == false)
    <div class="row">
      <div class="col-12">
        <div class="alert alert-danger" role="alert">
          No existen marcas creadas. Muy pronto el administrador creara su catalogo para que pueda ser visualizado.
          </div>
      </div>
    </div>
    @else

    @foreach ($marcas as $marca)
      <div class="col-12 col-md-4">
        <div class="row categoria">
          <div class="col-6">
            <img class="img-100" src="http://placeimg.com/640/360/any">
          </div>
          <div class="col-6 d-flex align-items-center">
            <p class="text-uppercase">{{$marca->nombre_marca}}<br><br><a class="btn btn-general" href="catalago/{{$marca->id}}">Ver Catalogo</a></p>
          </div>
        </div>
      </div>    
    @endforeach    
  @endif
  </div>  
@endsection