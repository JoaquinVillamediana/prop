@extends('frontend/layouts.app')

@include('frontend/layouts.header')



@section('content')
@include('frontend/layouts.ourJs')

<!-- Our Custom CSS -->
<link rel="stylesheet" href="/css/frontend/search.css">
<link rel="stylesheet" href="/css/frontend/propieties2.css">

<?php
if(empty($default_type))
{
  $default_type = null;
  
}
if(empty($default_property))
{
  $default_property = null;
}

if(empty($default_locality))
{
  $default_locality = null;

}

?>

<!------ Include the above in your HEAD tag ---------->
<div class="row w-100 main-container">
  <div class="col-lg-6 col-xl-3 col-12">
    @include('frontend/layouts.slide')
  </div>
  <div class="col-lg-6 col-xl-9 col-12 col-list">
    <h4 class="site"></h4>


    <div id="prop-container">

      <div class="order">
        <a class="order-by" id="order-by" href="">Ordenar por: <span class="order-selected">Default <i id="order-arrow"
              class="ml-1  fas fa-angle-down"></i></span></a>
        <div class="order-options">
          <a class="order-option" data-order="none" href="">Default</a>
          <a class="order-option" data-order="ASC" href="">Menor Precio</a>
          <a class="order-option" data-order="DESC" href="">Mayor Precio</a>
        </div>
      </div>
      <div class="props" id="props">
      </div>
    </div>
  </div>
</div>


<script>
  const localities = {!! json_encode($aLocalities); !!};
  const default_type = {!! json_encode($default_type) !!}
  const default_property = {!! json_encode($default_property) !!}
  const default_locality = {!! json_encode($default_locality) !!}
</script>




<script src="/js/functions.js"></script>
<script src="/js/search.js"></script>
<script src="/js/ajax_request.js"></script>
@include('frontend/layouts.footer')
@endsection