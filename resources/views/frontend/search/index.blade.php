@extends('frontend/layouts.app')

@include('frontend/layouts.header')



@section('content')
@include('frontend/layouts.ourJs')

<!-- Our Custom CSS -->
<link rel="stylesheet" href="css/frontend/search.css">
<link rel="stylesheet" href="css/frontend/propieties2.css">


<!------ Include the above in your HEAD tag ---------->
<div class="row w-100 main-container">
  <div class="col-lg-6 col-xl-3 col-12">
    @include('frontend/layouts.slide')
  </div>
  <div class="col-lg-6 col-xl-9 col-12 col-list">
    <h4 class="site">{{$ubicacion}}</h4>


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
        @if(!empty($aPropieties))
        @foreach($aPropieties as $optype)

        <div class="card" id="card-prop">

          <div class="row ">
            <div class="col-md-4">




              <div id="carouselExampleControls{{$optype->id}}" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/index/home1.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/index/home1.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/index/home1.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls{{$optype->id}}" role="button"
                  data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls{{$optype->id}}" role="button"
                  data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

            </div>
            <div class="col-md-8">

              <a href="{{ route('propietie',$optype->id) }}">
                <div class="card-block ">
                  <h3 class="card-title mt-2"> {{$optype->name}} </h3>
                  <p class="card-text"> {{$optype->description}} </p>

                  <!--  -->
                  <div class="row row-caracs">
                    <h3> USD{{$optype->price}}</h3>
                    <span id="rooms" class="characteristic" data-toggle="tooltip" data-placement="top"
                      title="3 Ambientes">{{$optype->rooms}}<i class="fas fa-home"></i></span>

                    <span id="bathrooms" class="characteristic" data-toggle="tooltip" data-placement="top"
                      title="1 Baño">1<i class="fas fa-toilet"></i></span>

                    <span id="bedrooms" class="characteristic" data-toggle="tooltip" data-placement="top"
                      title="1 Dormitorio">2<i class="fas fa-bed"></i></span>


                    <a href="{{ route('propietie',$optype->id) }}" id="btncontacto"
                      class="btn btn-danger ml-auto mr-4 mb-4">

                      Contactar</a>

                  </div>
                  <!--  -->
                </div>
              </a>
            </div>
          </div>

        </div>

        @endforeach


        @else
        <div class="row not-found">
          <h2>Lo sentimos! No encontramos propiedades compatibles con tu busqueda</h2>
          <div class="not-found-lottie">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_g8sNgp.json" background="transparent"
              speed="1" style="width: 200px; height: 200px;" autoplay></lottie-player>
          </div>
        </div>
        @endif



      </div>
    </div>
  </div>
</div>


<script>
  const localities = {!! json_encode($aLocalities); !!};
</script>


<script src="/js/functions.js"></script>
<script src="/js/search.js"></script>
<script src="/js/ajax_request.js"></script>

@endsection