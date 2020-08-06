@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')
<link rel="stylesheet" href="/css/frontend/home.css">
<link rel="stylesheet" href="/css/frontend/properties.css">
<section id="main">
  <div id="carousel" class="carousel slide" data-ride="carousel" data-pause="false">

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/index/slider1.jpg" class="d-block w-100" alt=" img 1">
      </div>
      <div class="carousel-item">
        <img src="images/index/slider2.jpg" class="d-block w-100" alt=" img 2">
      </div>
      <div class="carousel-item">
        <img src="images/index/slider3.jpg" class="d-block w-100" alt=" img 3 ">
      </div>
      <div class="overlay">
        <div class="container">
          <div class="row row-overlay">
            <div class="col-12 mt-4">
              <h1>Bienvenido a CuloProp</h1>
            </div>
            <div class="col-12 text">
              <p> Publica tu propiedad en 5 minutos y consigue que nuestros mas de 500.000 usuarios la vean.
              </p>
            </div>
            <div class="col-md-6 col-12"><input placeholder="Ubicacion:" type="text" name="text" id="text">
            </div>
            <div class="col-md-2 search-option col-12 ">
              <select name="type" id="type">
                <option value="1">Alquiler</option>
                <option value="2">Venta</option>
              </select>
            </div>
            <div class="col-md-2 search-option last col-12">
              <select name="building" id="building">
                <option selected value="0">Cualquiera</option>
                <option value="1">Casa</option>
                <option value="1">Casa</option>
                <option value="1">Casa</option>
              </select>
            </div>
            <div class="col-md-2 col-12 text-right">
              <button class="btn btn-search" ><i class="fas fa-search"></i></button>
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
        </div>

      </div>
    </div>


  </div>


  </div>
</section>
<!-- endmain -->
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

<!-- endprops -->
@include('frontend/layouts.footer')


@endsection