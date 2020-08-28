@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')


<link rel="stylesheet" href="/css/frontend/product.css">
<div class="mt-5 pb-5 container-fluid">

  @if(!empty($aProp))
  @foreach($aProp as $prop)

  <div class="container">
    <div class="row">


      <div class="col-md-7 col-12">
        <div class="name-responsive">
          <h5 class="product-title">{{ $prop->name }}</h5>
          <p class="product-price" style="color:#000;">U$D {{ $prop->price }} </p>
        </div>
        <!-- carrousel -->
        <div class="col-12 mt-2 mb-4 div-main-image col-images">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/images/index/home1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="/images/index/home1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="/images/index/home1.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

        {{-- <div class="container"> --}}

          <!-- Fin de carrousel  -->
          <!-- Características generales -->
          <div class="characteristcs-div" style="border: 1px solid #ccc!important;">
            <div class="container">
              <h4>Caracteristicas</h4>
              <ul class="characteristcs">
                <li class="carac-item"><span class="carac-desc"><i
                      class="fas fa-couch"></i>Cuartos</span>{{ $prop->rooms }} </li>
                <li class="carac-item"><span class="carac-desc"><i
                      class="fas fa-bed"></i>Habitaciones</span>{{ $prop->bedrooms }}</li>
                <li class="carac-item"><span class="carac-desc"><i
                      class="fas fa-bath"></i>Baños</span>{{ $prop->bathroooms }}</li>
                <li class="carac-item"><span class="carac-desc"><i
                      class="fas fa-ruler-combined"></i>Tamaño</span>{{ $prop->rooms }}m<sup>2</sup></li>
              </ul>
            </div>
          </div>

          <div class="card bg-light mb-3 mt-2"
            style="  font-weight: bold;    border: 1px solid #ccc!important;">
            <div class="card-body">
              <h5 class="card-title">Descripción</h5>
              <p class="card-text">{{ $prop->description }}</p>
            </div>
          </div>

          <!-- Fin de características generales -->

        {{-- </div> --}}
      </div>
      <!-- FIN DE COLUMNA DE CARACTERÍSTICAS Y DE FOTOS -->

      <!-- COLUMNA DE FORMULARIO DE CONTACTO Y USUARIO -->
      <div class="col-md-5 col-12">
        <div class="row">
          <div class="container name-default">
            <h5 class="product-title">{{ $prop->name }}</h5>
            <p class="product-price" style="color:#000;">U$D {{ $prop->price }} </p>
          </div>
        </div>
        <p>{{ $prop->description }}</p>
        <!-- FORMULARIO DE CONTACTO -->
        <section id="contacto">
          <div class="container">
            <form id="formulario">
              <div class="row">
                
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label for="email">Dirección de email</label>
                      <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                  </div>
                  <div class="col-lg-6 col-12">
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" id="name" placeholder="Nombre y apellido">
                    </div>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Telefono</label>
                <input type="number" class="form-control" id="exampleFormControlInput1"
                  placeholder="Numero de teléfono">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensaje</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"
                  rows="3">Hola, vi esta propiedad en TuProximaProp y estoy interesado. Quiero que me contacten. Gracias.</textarea>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-6 col-buttons">
                    <button class="btn btn-prop" type="submit"><i class="fas fa-envelope-square"></i> Contactar</button>
                  </div>
                  <div class="col-6 col-buttons">
                    <button class="btn btn-prop" type="submit"><i class="fas fa-phone"></i> Llamar</button>
                  </div>
                </div>
                
              </div>
            </form>
            
          </div>
        </section>
        <!-- FIN DE FORMULARIO DE CONTACTO -->
        <!-- datos de anunciante -->
        <section id="user_publish" style="margin-top :40px; margin-bottom:20px;">
          <h2>Datos del anunciante</h2>
          <div class="card w-70">
            <div class="card-body">
              <h5 class="card-title">{{ $prop->user_name }}</h5>
              <p class="card-text">@if($prop->user_type == 2) <i class="fas fa-user"></i> {{"dueño directo"}} | <i
                  class="fas fa-phone"></i> {{ $prop->user_phone }} @else <i class="fas fa-user-tie"></i>
                {{"Profesional"}} | <i class="fas fa-phone"></i> @if(!empty($data_user->phone))
                {{ $prop->user_phone }} @else {{"El usuario no cargo su número de teléfono."}}@endif @endif</p>
              <a href="{{ route('user_profile_publications',$prop->user_id) }}" class="btn btn-prop">Ver perfil</a>
            </div>
          </div>
        </section>
        <!-- findatos de anunciante -->
      </div>



      @endforeach
      @endif
    </div>


  </div>











  <script>
    function changeMainImage(id,type){
  if(type == 'image')
  {
    url = "/uploads/products/"+id;
    $('.main-image').attr('src',url);
    $('.main-video').attr('src','');
    $('.main-video').css('display','none');
    $('.main-image').css('display','block');
  }
  else
  {
    url = "/uploads/products/"+id;
    $('.main-video').attr('src',url);
    $('.main-image').attr('src','');
    $('.main-video').css('display','block');
    $('.main-image').css('display','none');
  }
  
}

  
  </script>



  <script type="text/javascript">
    function setFavoriteProductResponse(data) {
    
      if(data.favorite > 0) {
          $('#favBtnActive_'+data.productId).css('display', 'block');
          $('#favBtn_'+data.productId).css('display', 'none');
          
      } 
      else{
        $('#favBtnActive_'+data.productId).css('display', 'none');
        $('#favBtn_'+data.productId).css('display', 'block');
      }
  }
  
  function ajaxRequest(type, url, params, callBack) {

      jQuery.support.cors = true;
      params = JSON.stringify(params);

      $.ajax({
          type: type,
          url: url,
          data: params,
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          beforeSend: function () {
              //$('#ajaxLoader').show();
          },
          complete: function () {
              //$('#ajaxLoader').hide();
          },
          success: function (data) {
             //console.log("REQUEST [ " + type + " ] [ " + url + " ] SUCCESS");
             //console.log(data);
              window[callBack](data);
          },
          error: function (msg, url, line) {
             //console.log('ERROR !!! msg = ' + msg + ', url = ' + url + ', line = ' + line);
          }
      });
  }



  </script>
  <script src="/vendor/bootstrap-input-spinner.js"></script>
  <script>
    $("input[type='number']").inputSpinner()
  </script>

  @include('frontend/layouts.footer')


  @endsection