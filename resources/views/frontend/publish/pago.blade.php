@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
<?php 
MercadoPago\SDK::setAccessToken('APP_USR-1532561834263359-083119-186977ebfbb7fc0a40e9677191ec4969-339019119');

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

if($plan->discount == 0)
{
  $item->unit_price =  $plan->price ;
}else {
 $new_price = (1 - ($plan->discount / 100)) * $plan->price;
 $item->unit_price =$new_price;
}


$preference->items = array($item);
$preference->binary_mode = true;
$preference->external_reference = $external_reference;
$preference->back_urls = array(
    "success" => route('pago_completado'),
    "failure" => route('mis_propiedades.index'),
    "pending" => route('mis_propiedades.index')
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
    <h3 class="align-middle mr-1">Precio total por mes: @if ($plan->discount == 0)${{$plan->price}}
      @else 
      <del class="text-secondary">${{$plan->price}}</del><span class="text-danger ml-1">${{(1 - ($plan->discount / 100)) * $plan->price}}</span>
      @endif</h3>
    
    {{-- <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
    data-preference-id="{{ $preference->id}}">
  </script> --}}


  </div>

  <div class="text-center mt-2">
    <a class="btn btn-MP" href="<?php echo $preference->init_point; ?>">Pagar</a>
  </div>

  

  @endforeach
  @endif
</div>
</div>


@include('frontend/layouts.footer')
@endsection