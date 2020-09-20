@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
<?php 
MercadoPago\SDK::setAccessToken('TEST-1409795886297499-091817-d907db205d0e546b55e80ee286fa237c-648138539');

?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/css/frontend/pago.css">
<div class="content">
<div class="container main-container">
  @if (!empty($aPlans))
  @foreach($aPlans as $plan)

  <?php
  $preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title =  $plan->name ;
$item->quantity = 1;

$item->unit_price =  $plan->price ;
$preference->items = array($item);
$preference->external_reference = $external_reference;
$preference->back_urls = array(
    "success" => route('pago_completado'),
    "failure" => route('pago_completado'),
    "pending" => route('pago_completado')
);
$preference->auto_return = "approved";
$preference->save();
  ?>
  <h2 class="text-center mt-4">PLAN <span style="color:{{$plan->color}}">{{$plan->name}}</span> </h2>
  
  <div class="descriptions">
    <p>Seleccionaste el plan <span style="color:{{$plan->color}}">{{$plan->name}}</span>, incluye las siguientes
      características:</p>
    <ul>
      <li><i class="fas fa-check-square mr-1"></i>{{ $plan->description1 }}</li>
      <li><i class="fas fa-check-square mr-1"></i>{{ $plan->description2 }}</li>
      <li><i class="fas fa-check-square mr-1"></i>{{ $plan->description3 }}</li>
    </ul>
  </div>
  <hr class="mt-5 mb-t5">
  <div class="price">
    <h3 class="align-middle mr-1">Precio total por mes: ${{$plan->price}}</h3>
    
    {{-- <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
    data-preference-id="{{ $preference->id}}">
  </script> --}}

<form action="{{ route('pago_completado') }}" method="POST">
  @csrf
  <script
   src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
   data-preference-id="<?php echo $preference->id; ?>">
  </script>
</form>
  </div>


  @endforeach
  @endif
</div>
</div>
{{-- <div class="row">
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
<div class="card" id="pago" style="width: 16rem;margin-top: 5rem;margin-left: 2rem;margin-bottom:10rem;">
  <div class="card-body">
    <h5 class="card-title">Detalle de la compra</h5>
    <h6 class="card-subtitle mb-2 text-muted">1 Plan {{ $planes->name }}
      $ {{ $planes->price }} + imp *</h6>
    <p class="card-text">Total: ${{ $planes->price }}</p>
    <?php
    $preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title =  $planes->name ;
$item->quantity = 1;
$item->unit_price =  $planes->price ;
$preference->items = array($item);
$preference->save();
    ?>
    <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
      data-preference-id="<?php echo $preference->id; ?>">
    </script>
  </div>
</div>
@endforeach
@endif
<!--  -->
</div> --}}

@include('frontend/layouts.footer')
@endsection