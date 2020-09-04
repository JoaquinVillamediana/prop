@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')
<link rel="stylesheet" href="css/frontend/myproperties.css">
<link rel="stylesheet" href="css/frontend/propieties2.css">
<div class="container" style="text-align: center;">
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
        <p class="card-text"> Funcion a agregar</p>
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


  <section id="propiedades">
    <h2>Mis porpiedades publicadas</h2>

    @if(!empty($aPropieties))
    <div class="container">
    @foreach($aPropieties as $prop)

    {{-- <div class="container">
      <div class="card mb-4" id="card-prop">
        <div class="row ">
          <!--  -->
          <div class="col-md-4">
            <img src="images/index/home1.jpg" class="w-100">
          </div>
          <!--  -->
          <!--  -->
          <div class="col-md-8 px-3">
            <div class="card-block px-3">
              <h3 class="card-title mt-2"> {{$optype->name}} </h3>
    <p class="card-text"> {{$optype->description}} </p>
    <!--  -->
    <div class="row row-caracs">
      <h3> USD{{$optype->price}}</h3>
      <span class="characteristic" data-toggle="tooltip" data-placement="top" title="3 Ambientes">{{$optype->rooms}}<i
          class="fas fa-home"></i></span>
      <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Baño">1<i
          class="fas fa-toilet"></i></span>
      <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Dormitorio">2<i
          class="fas fa-bed"></i></span>
      <a href="{{ route('edit_propietie',$optype->id) }}" class="btn btn-danger ml-auto mr-4 mb-4">Editar</a>
      <a href="{{ route('propietie',$optype->id) }}" class="btn btn-danger  mb-4">Ver anuncio</a>
    </div>
    <!--  -->
</div>
</div>
<!--  -->
</div>

</div>
</div> --}}
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
          <h3 class="price"><span class="currency"><span class="currency-symbol">{{ $prop->symbol }}</span></span> {{ $prop->price}}</h3>
          <p class="card-text description">{{ $prop->description}}</p>
          <p class="characteristics"><span id="rooms" class="characteristic" data-toggle="tooltip" data-placement="top"
              title="{{ $prop->rooms}} Ambientes"><i class="fas fa-home"></i>Cuartos <span class="quantity">{{ $prop->rooms}}</span></span><span id="bathrooms" class="characteristic"
              data-toggle="tooltip" data-placement="top"title="{{ $prop->bathrooms}} Baño"><i
                class="fas fa-toilet"></i>Baños <span class="quantity">{{ $prop->bathrooms}}</span></span><span
              id="bedrooms" class="characteristic" data-toggle="tooltip" data-placement="top" title="{{ $prop->bedrooms}} Dormitorio"><i class="fas fa-bed"></i>Dormitorios <span
                class="quantity">{{ $prop->bedrooms}}</span></span> <span id="size" class="characteristic"
              data-toggle="tooltip" data-placement="top" title="{{ $prop->size}} m2"><i
                class="fas fa-ruler-combined"></i>Tamaño <span class="quantity">{{ $prop->size}}m<sup>2</sup></span></span></p><a href="http://192.168.0.200:8080/propietie/{{ $prop->id }}"
            id="btncontacto" class="btn btn-contact d-block">Ver más</a>
            <a href="http://192.168.0.200:8080/propietie/{{ $prop->id }}"
              id="btncontacto" class="btn btn-contact d-block">Editar</a>
        </div>
      </a></div>
  </div>
</div>
@endforeach
</div>
@endif
</section>
</div>


@include('frontend/layouts.footer')


@endsection