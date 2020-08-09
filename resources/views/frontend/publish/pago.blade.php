@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/frontend/pago.css">
   
    
  <body>
  <div class="row">
  <!--  -->
  @if(!empty($aPlans))
  @foreach($aPlans as $planes)
  <div class="card" id="descripcion" style="width: 60rem; margin-left: 5rem;margin-top: 5rem;margin-bottom:10rem;">
  <div class="card-header">
    Plan {{ $planes->name }}
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    <p> * {{ $planes->description1 }}</p>
    <p> *{{ $planes->description2 }}</p>
      <p> * {{ $planes->description3 }}</p>
      <footer class="blockquote-footer">Precio: $<cite title="Source Title">{{ $planes->price }}</cite></footer>
    </blockquote>
  </div>
</div>
<!--  -->
<div class="card" id="pago" style="width: 18rem;margin-top: 5rem;margin-left: 5rem;margin-bottom:10rem;">
  <div class="card-body">
    <h5 class="card-title">Detalle de la compra</h5>
    <h6 class="card-subtitle mb-2 text-muted">1 Plan {{ $planes->name }}
$ {{ $planes->price }} + imp *</h6>
    <p class="card-text">Total: ${{ $planes->price }}</p>
    <a href="#" class="card-link">Comprar</a>
   
  </div>
</div>
@endforeach
@endif
<!--  -->
  </div>
  </body>
  @include('frontend/layouts.footer')
  @endsection
