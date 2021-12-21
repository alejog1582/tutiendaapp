@extends('layouts.app')

@section('content')
  <div class="row text-center container-titulo">
    <div class="col-12">
      <h1 class="text-center titulo-principal">Catalogo</h1>
    </div>
  </div>    
  <div class="row">
    <div class="col-12 col-md-4">
      <div class="row categoria">
        <div class="col-6">
          <img class="img-100" src="{{ asset('images/cumpleanos.jpg') }}">
        </div>
        <div class="col-6 d-flex align-items-center">
          <p class="text-uppercase">regalo de <br><b>cumpleaños</b><br><br><a class="btn btn-general" href="catalago/cumpleanos">Ver Catalogo</a></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="row categoria">
        <div class="col-6">
          <img class="img-100" src="{{ asset('images/aniversario.jpg') }}">
        </div>
        <div class="col-6 d-flex align-items-center">
          <p class="text-uppercase">regalo de <br><b>aniversario</b><br><br><a class="btn btn-general" href="catalago/aniversario">Ver Catalogo</a></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="row categoria">
        <div class="col-6">
          <img class="img-100" src="{{ asset('images/light.jpg') }}">
        </div>
        <div class="col-6 d-flex align-items-center">
          <p class="text-uppercase">regalos <br><b>light</b><br><br><a class="btn btn-general" href="catalago/light">Ver Catalogo</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-4">
      <div class="row categoria">
        <div class="col-6">
          <img class="img-100" src="{{ asset('images/picnic.jpg') }}">
        </div>
        <div class="col-6 d-flex align-items-center">
          <p class="text-uppercase">regalo<br><b>picnic</b><br><br><a class="btn btn-general" href="catalago/picnic">Ver Catalogo</a></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="row categoria">
        <div class="col-6">
          <img class="img-100" src="{{ asset('images/endulzadas.jpg') }}">
        </div>
        <div class="col-6 d-flex align-items-center">
          <p class="text-uppercase">regalos <br><b>endulza el dia</b><br><br><a class="btn btn-general" href="catalago/endulzadas">Ver Catalogo</a></p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="row categoria">
        <div class="col-6">
          <img class="img-100" src="{{ asset('images/anchetas.jpg') }}">
        </div>
        <div class="col-6 d-flex align-items-center">
          <p class="text-uppercase">regalos<br><b>anchetas</b><br><br><a class="btn btn-general" href="catalago/anchetas">Ver Catalogo</a></p>
        </div>
      </div>
    </div>
  </div>
@endsection