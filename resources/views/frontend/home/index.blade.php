@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')
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
          <div class="row">
            <div class="overlay">
              <div class="container mt-4">
                <h1>Bienvenido a CuloProp</h1>
                <p> Publica tu propiedad en 5 minutos y consigue que nuestros mas de 500.000 usuarios la vean.
                </p>

              </div>

            </div>

          </div>

        </div>
        <div class="row row-search">
          <div class="col-12  text-center">
          <div class="input-group mb-3">
  <div class="input-group-prepend">
    <button type="button" class="btn btn-outline-secondary">Action</button>
    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div role="separator" class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </div>
  <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
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
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/index/home1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <div class="badge mb-2">
              <span class="badge badge-warning"> 4 dormintorios </span>
              <span class="badge badge-info"> 3 baños </span>
            </div>
            <h5 class="card-title mb-0">Prop 1</h5>

            <p class="card-text">4 baños y un par de boludeces.</p>
            <a href="#" class="btn btn-primary">Más información</a>
          </div>
        </div>

      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/index/home2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <div class="badge mb-2">
              <span class="badge badge-warning"> 4 dormintorios </span>
              <span class="badge badge-info"> 3 baños </span>
            </div>
            <h5 class="card-title mb-0">Prop 2</h5>

            <p class="card-text ">4 baños y un par de boludeces.</p>
            <a href="#" class="btn btn-primary">Más información</a>
          </div>
        </div>

      </div>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="images/index/home3.jpg" class="card-img-top" alt="...">
          <div class="card-body">


            <div class="badge mb-2">
              <span class="badge badge-warning"> 4 dormintorios </span>
              <span class="badge badge-info"> 3 baños </span>
            </div>
            <h5 class="card-title mb-0">Prop 3</h5>

            <p class="card-text">4 baños y un par de boludeces.</p>
            <a href="#" class="btn btn-primary">Más información</a>
          </div>
        </div>

      </div>
    </div>


  </div>
</section>

<!-- endprops -->
@include('frontend/layouts.footer')


@endsection