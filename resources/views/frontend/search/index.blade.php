@extends('frontend/layouts.app')

@include('frontend/layouts.header')

<?php
if(empty($oSearch))
{
  $oSearch = new \App\Classes\SearchClass;
}
?>

@section('content')


<!-- Our Custom CSS -->
<link rel="stylesheet" href="/css/frontend/search.css">
<link rel="stylesheet" href="/css/frontend/propieties2.css">
<script>
  /* when document is ready */
  
  </script>
  <style type="text/css">
  
  </style>
<!------ Include the above in your HEAD tag ---------->
<div class="row w-100 mb-5 main-container">
  <div class="col-lg-6 col-xl-3 col-12">
    @include('frontend/layouts.slide')
  </div>
  <div class="col-lg-6 col-xl-9 col-12 col-list">
    <h4 class="site"></h4>


    <div id="prop-container">

      <div class="order">
        <a class="order-by" id="order-by" href="">Ordenar por: <span class="order-selected"> Relevantes<i id="order-arrow"
              class="ml-1  fas fa-angle-down"></i></span></a>
        <div class="order-options">
          <a class="order-option" data-order="none" href="">Relevantes</a>
          <a class="order-option" data-type="price" data-order="ASC" href="">Menor Precio</a>
          <a class="order-option" data-type="price" data-order="DESC" href="">Mayor Precio</a>
          <a class="order-option" data-type="size" data-order="ASC" href="">Menor Tamaño</a>
          <a class="order-option" data-type="size" data-order="DESC" href="">Mayor Tamaño</a>
        </div>
      </div>
      <div class="props" id="props">
        
      </div>
      <p id="pagination-holder" class="pagination-holder"></p>
    </div>
  </div>
</div>


<script>
  const localities = {!! json_encode($aLocalities); !!};
  const default_type = {!! json_encode($oSearch->operationType) !!}
  const default_property = {!! json_encode($oSearch->buildingType) !!}
  const default_locality = {!! json_encode($oSearch->locality) !!}
  const default_currency = {!! json_encode($oSearch->currency) !!}
  const aCurrencies = {!! json_encode($aCurrencies) !!}
</script>



<script src="/vendor/jquery.bootpag.min.js"></script>
<script src="/js/functions.js"></script>
<script src="/js/search.js"></script>
<script src="/js/ajax_request.js"></script>

@include('frontend/layouts.footer')
@endsection