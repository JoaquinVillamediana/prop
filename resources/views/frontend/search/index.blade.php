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


    <div>

      @if(!empty($aPropieties))
      @foreach($aPropieties as $optype)

      <div class="card" id="card-prop">

        <div class="row ">
          <div class="col-md-4">
            <img src="images/index/home1.jpg" class="w-100">
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
<script>
   var localities = <?php  echo json_encode($aLocalities); ?>;
  $('.options').hide();
  var aLocalities = localities.map((element) => {
    return element.nombre;
  });
  
  $('#location').on("input",() => {
    displayLocalities($('#location'));
    
  });
</script>
<script src="/js/functions.js"></script>


@endsection