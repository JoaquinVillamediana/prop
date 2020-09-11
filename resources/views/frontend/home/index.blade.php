@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')

<link rel="stylesheet" href="/css/frontend/home.css">
<link rel="stylesheet" href="/css/frontend/properties.css">
<div class="overlay">
  <div class="container">

    <form action="{{ route('search') }}">
      <div class="row row-overlay">
        <div class="col-12 mt-4">
          <div class="row">
          <h1>Encontrá <b>tu proxima propiedad</b> en 3 CLICKS</h1>  
          </div>
        </div>
        <div class="col-12 text">
          <p>Comprá, alquilá o vendé inmuebles en Argentina
          </p>
        </div>



        <div class="col-lg-6 col-12">
          <input placeholder="Ubicacion:" type="text" name="text" id="location" autocomplete="off">
          <input type="hidden" name="locality" value="" id="locality">
          <div class="options">

          </div>
        </div>




        @if(!empty($aOperationType))

        <div class="col-lg-2 search-option col-12 ">
          <select name="type" id="type">
            @foreach($aOperationType as $optype)
            <option value="{{$optype->id}}">{{$optype->name}}</option>
            @endforeach
          </select>
        </div>

        @endif
        @if(!empty($aPropietie_type))
        <div class="col-lg-2 search-option last col-12">
          <select name="building" id="building">
            @foreach($aPropietie_type as $optype)
            <option value="{{$optype->id}}">{{$optype->name}}</option>
            @endforeach

          </select>
        </div>
        @endif
        <div class="col-lg-2 col-12 text-right">
          <button class="btn btn-search"><i class="fas fa-search"></i></button>
        </div>
        <div class="col-12">
          <button class="btn btn-search-mobile">Buscar!</button>
        </div>
        <div class="col-12 mt-2 advanced text-center">
          <a href="{{ route('search') }}" class="btn btn-advanced">
            Buscador Avanzado
          </a>
        </div>
      </div>
    </form>
  </div>

</div>
<section id="main">

   <div id="carousel" class="carousel slide" data-ride="carousel" data-pause="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
       <img src="images/index/slider5.jpg" class="d-block w-100" alt=" img 1">
       </div>
       <div class="carousel-item">
      <img src="images/index/slider5.jpg" class="d-block w-100" alt=" img 1">
      </div>
      <div class="carousel-item">
        <img src="images/index/slider5.jpg" class="d-block w-100" alt=" img 1">
      </div>
    </div> 


  </div>


  </div>
</section>
<!-- endmain -->


<section class="section-publish">
  <div class="container">
    <h2>
      OFERTA <span><a href=""> 6 MESES SIN INTERÉS</a></span>
    </h2>
  </div>
</section>





@if(!empty($aProperties))


<!-- props -->
<section id="props" class="mt-4">

  <div class="container">
    <div class="row">
      <div class="col text-center text-uppercase">
        <small> Conocé nuestras</small>
        <h2> Propiedades destacadas</h2>
      </div>
    </div>
    @include('frontend/layouts.prop')
  </div>
</section>

<script>
  var localities = {!! json_encode($aLocalities); !!};
</script>

@endif

@include('frontend/layouts.footer')
<script src="/js/home.js"></script>
<script src="/js/functions.js"></script>

@endsection