@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')
<link rel="stylesheet" href="css/frontend/myproperties.css">
<link rel="stylesheet" href="css/frontend/propieties2.css">
<div class="container">

  <?php
  $dataPoints = array(
	array("label"=> "Ultimas 24 Horas", "y"=> $aViews['past24Views']),
  array("label"=> "Ultimas 48 Horas", "y"=> $aViews['past48Views']),
  array("label"=> "Ultimo Mes", "y"=> $aViews['pastMonthViews']),
  array("label"=> "Totales", "y"=> $aViews['totalViews'])
);
  ?>


  <h2>
    PANEL DE CONTROL
  </h2>
  <!-- <a href="{{ route('my_plans') }}"> Mis contrataciones</a> -->

  <div class="functions ">
    <!--  -->
    <div class="card   function">
      <div class="back-icon">
        <i class="fas fa-home"></i>
      </div>
      <div class="card-header">N° publicaciones</div>
      <div class="card-body">
        <h5 class="card-title">@if(!empty($aDatosProp)) @foreach($aDatosProp as $datos) {{$datos->countprop}}
          @endforeach @endif</h5>
        <!-- <p class="card-text"> <a href="#propiedades">Ver propiedades</a> </p> -->
      </div>
    </div>
    <!--  -->
    <div class="card   function">
      <div class="back-icon">
      <i class="far fa-comments"></i>
      </div>
      <div class="card-header">N° Contactados</div>
      <div class="card-body">
        <h5 class="card-title">@if(!empty($aDatos)) @foreach($aDatos as $datos) {{$datos->count_contactados}}
          @endforeach @endif</h5>
        <!-- <p>N° de contactados</p> -->
        <!-- <p class="card-text"> <a href="{{ route('messages') }}"> Ver contactados</a> </p> -->
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
        <!-- <p class="card-text"> <a href="">Ver perfil</a></p> -->
      </div>
    </div>
    <!--  -->

  </div>

  <div class="graphs">
    <div id="viewsPerPeriod" style="height: 370px; width: 100%;"></div>
  </div>


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