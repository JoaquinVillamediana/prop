@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')


<link rel="stylesheet" href="/css/frontend/product.css">
<div class="mt-5 pb-5 container-fluid">

      @if(!empty($aProp))
      @foreach($aProp as $prop)

 <div class="container">
  <div class="row">
  

    <div class="col-md-6 col-12">
     
<!--  -->
<div  class="col-12 mt-2 mb-4 div-main-image">
<div id="carouselExampleControls"  class="carousel slide" data-ride="carousel">
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
          
     

<!--  -->

    </div>

    <div class="col-md-5 col-12">
      <div class="row"> 
        <h5 class="product-title">{{ $prop->name }}</h5>   <p class="card-text product-price" style="color:#000;">U$D {{ $prop->price }} </p>
      </div>
        <p>{{ $prop->description }}</p>
        <section id="contacto">
          <form id="formulario">
            <div class="row">    
              <div class="form-group">
                <label for="email">Dirección de email</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
              </div>
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" placeholder="Nombre y apellido">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Telefono</label>
              <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Numero de teléfono">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Example textarea</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Hola, vi esta propiedad en TuProximaProp y estoy interesado. Quiero que me contacten. Gracias.</textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit"><i class="fas fa-envelope-square"></i> Contactar</button>
            </div>
          </form>
          <button class="btn btn-primary" type="submit"><i class="fas fa-phone"></i> Llamar</button>
        </section>
    </div>
    
    <div class="col-md-6 col-12">
      <div class="card" style="width: 35rem; ">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"> Caracteísticas generales</li>  
          <li class="list-group-item"> <i class="fas fa-couch"></i> {{ $prop->rooms }} | <i class="fas fa-bed"></i> {{ $prop->bedrooms }} | <i class="fas fa-bath"></i> {{ $prop->bathroooms }} | <i class="fas fa-ruler-combined"></i> {{ $prop->rooms }} mt2 </li>
        </ul>
      </div>
    </div>
    <div class="col-md-5 col-12">
    <h2>Datos del anunciante</h2>
    <div class="card w-70">
      <div class="card-body">
        <h5 class="card-title">{{ $prop->user_name }}</h5>
        <p class="card-text">@if($prop->user_type == 2) <i class="fas fa-user"></i> {{"dueño directo"}} | <i class="fas fa-phone"></i> {{ $prop->user_phone }} @else <i class="fas fa-user-tie"></i> {{"Profesional"}} | <i class="fas fa-phone"></i> @if(!empty($data_user->phone))
        {{ $prop->user_phone }} @else {{"El usuario no cargo su número de teléfono."}}@endif @endif</p>
        <a href="{{ route('user_profile_publications',$prop->user_id) }}" class="btn btn-primary">Ver perfil</a>
      </div>
    </div>
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