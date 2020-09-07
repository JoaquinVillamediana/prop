@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')
<link rel="stylesheet" href="css/frontend/myproperties.css">
<link rel="stylesheet" href="css/frontend/propieties2.css">
<div class="container" style="text-align: center;">

  <?php
  $dataPoints = array(
	array("label"=> "Ultimas 24 Horas", "y"=> $aViews['past24Views']),
  array("label"=> "Ultimas 48 Horas", "y"=> $aViews['past48Views']),
  array("label"=> "Ultimo Mes", "y"=> $aViews['pastMonthViews']),
  array("label"=> "Totales", "y"=> $aViews['totalViews'])
);
  ?>


  <h2>
    Panel de control
  </h2>


  <div class="functions ">
    <!--  -->
    <div class="card   function">
      <div class="back-icon">
        <i class="fas fa-home"></i>
      </div>
      <div class="card-header">Mis publicaciones</div>
      <div class="card-body">
        <h5 class="card-title">@if(!empty($aDatosProp)) @foreach($aDatosProp as $datos) {{$datos->countprop}}
          @endforeach @endif</h5>
        <p class="card-text"> <a href="#propiedades">Ver propiedades</a> </p>
      </div>
    </div>
    <!--  -->
    <div class="card   function">
      <div class="back-icon">
        <i class="far fa-address-book"></i>
      </div>
      <div class="card-header">Contactados</div>
      <div class="card-body">
        <h5 class="card-title">@if(!empty($aDatos)) @foreach($aDatos as $datos) {{$datos->count_contactados}}
          @endforeach @endif</h5>
        <p class="card-text"> <a href="{{ route('messages') }}"> Ver contactados</a> </p>
      </div>
    </div>
    <!--  -->
    <div class="card   function">
      <div class="back-icon">
        <i class="fas fa-eye"></i>
      </div>
      <div class="card-header">Mis visitas</div>
      <div class="card-body">
        <h5 class="card-title">Numero de visitas</h5>
        <p class="card-text">{{ $aViews['totalViews'] }}</p>
      </div>
    </div>
    <!--  -->
    <div class="card   function">
      <div class="back-icon">
        <i class="far fa-user"></i>
      </div>
      <div class="card-header">Mi perfil</div>
      <div class="card-body">
        <h5 class="card-title"> {{ Auth::user()->last_name}}, {{ Auth::user()->name}} </h5>
        <p class="card-text"> <a href="">Ver perfil</a></p>
      </div>
    </div>
    <!--  -->

  </div>

  <div class="graphs">
    <div id="viewsPerPeriod" style="height: 370px; width: 100%;"></div>
  </div>


  <section id="propiedades">
    <h2>Mis porpiedades publicadas</h2>

    @if(!empty($aProperties))
    <div class="container">
      @foreach($aProperties as $prop)

      <div class="card" id="card-prop">
        <div class="row ">
          <div class="col-xl-6 col-12">
            <div id="carouselPropControls-{{ $prop->id }}" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active"><img src="/images/index/home1.jpg" class="d-block w-100"></div>
                <div class="carousel-item"><img src="/images/index/home1.jpg" class="d-block w-100"></div>
                <div class="carousel-item"><img src="/images/index/home1.jpg" class="d-block w-100"></div>
              </div><a class="carousel-control-prev" href="#carouselPropControls-{{ $prop->id }}" role="button"
                data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span
                  class="sr-only">Previous</span></a><a class="carousel-control-next"
                href="#carouselPropControls-{{ $prop->id }}" role="button" data-slide="next"><span
                  class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
            </div>
          </div>
          <div class="col-xl-6 col-12"><a href="http://192.168.0.200:8080/propietie/{{ $prop->id }}">
              <div class="card-block ">
                <h3 class="card-title mt-2 "> {{ $prop->name }} </h3>
                <h3 class="price"><span class="currency"><span class="currency-symbol">{{ $prop->symbol }}</span></span>
                  {{ $prop->price}}</h3>
                <p class="card-text description">{{ $prop->description}}</p>
                <p class="characteristics"><span id="rooms" class="characteristic" data-toggle="tooltip"
                    data-placement="top" title="{{ $prop->rooms}} Ambientes"><i class="fas fa-home"></i>Cuartos <span
                      class="quantity">{{ $prop->rooms}}</span></span><span id="bathrooms" class="characteristic"
                    data-toggle="tooltip" data-placement="top" title="{{ $prop->bathrooms}} Baño"><i
                      class="fas fa-toilet"></i>Baños <span class="quantity">{{ $prop->bathrooms}}</span></span><span
                    id="bedrooms" class="characteristic" data-toggle="tooltip" data-placement="top"
                    title="{{ $prop->bedrooms}} Dormitorio"><i class="fas fa-bed"></i>Dormitorios <span
                      class="quantity">{{ $prop->bedrooms}}</span></span> 
                      <span id="size" class="characteristic"
                    data-toggle="tooltip" data-placement="top" title="{{ $prop->size}} m2"><i
                      class="fas fa-ruler-combined"></i>Tamaño <span
                      class="quantity">{{ $prop->size}}m<sup>2</sup></span></span>

                      <span id="size" class="characteristic"
                    data-toggle="tooltip" data-placement="top" title="{{ $aViews['Property-'.$prop->id]}} Visitas"><i class="fas fa-eye"></i>Visitas Totales <span
                      class="quantity">{{ $aViews['Property-'.$prop->id]}}</span></span>
                    </p>
                <a href="http://192.168.0.200:8080/propietie/{{ $prop->id }}" id="btncontacto"
                  class="btn btn-contact d-block">Ver más</a>
                <a href="{{ route('mis_propiedades.edit',$prop->id) }}" id="btncontacto"
                  class="btn btn-contact d-inline-block">Editar información</a> <a
                  href="{{ route('mis_propiedades.edit',$prop->id) }}" id="btncontacto"
                  class="btn btn-contact d-inline-block">Editar fotos</a>
              </div>
            </a></div>
        </div>
      </div>
      @endforeach
    </div>
    @endif
  </section>
</div>
<script>
  window.onload = function () {
   
  var chart = new CanvasJS.Chart("viewsPerPeriod", {
    
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title: {
      fontWeight: "lighter",
      fontFamily: "Nunito",
      text: "Visitas a tus propiedades"
    },
    axisY: {
      fontWeight: "lighter",
      fontFamily: "Nunito",
      title: "Numero de visitas"
    },
    data: [{
      type: "column",
      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
  });
  chart.render();
   
  }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@include('frontend/layouts.footer')


@endsection