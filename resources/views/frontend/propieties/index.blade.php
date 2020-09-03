@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')
<link rel="stylesheet" href="css/admin/users.css">
<div class="container" style="text-align: center;">
    <h2>
    Mis anuncios
    </h2>
    

    <div class="row">
<!--  -->
    <div class="card text-white bg-danger mb-5" style="max-width: 18rem;">
  <div class="card-header">Mis publicaciones</div>
  <div class="card-body">
    <h5 class="card-title">@if(!empty($aDatosProp)) @foreach($aDatosProp as $datos) {{$datos->countprop}} @endforeach @endif</h5>
    <p class="card-text">  <a href="">Ver propiedades</a> </p>
  </div>
</div>
<!--  -->
<div class="card text-white bg-danger mb-5 ml-3" style="max-width: 18rem;">
  <div class="card-header">Contactados</div>
  <div class="card-body">
    <h5 class="card-title">@if(!empty($aDatos)) @foreach($aDatos as $datos) {{$datos->count_contactados}} @endforeach @endif</h5>
    <p class="card-text"> <a href="{{ route('messages') }}"> Ver contactados</a> </p>
  </div>
</div>
<!--  -->
<div class="card text-white bg-danger mb-5 ml-3" style="max-width: 18rem;">
  <div class="card-header">Mis visitas</div>
  <div class="card-body">
    <h5 class="card-title">Numero de visitas</h5>
    <p class="card-text"> Funcion a agregar</p>
  </div>
</div>
<!--  -->
<div class="card text-white bg-danger mb-5 ml-3" style="max-width: 18rem;">
  <div class="card-header">Mi perfil</div>
  <div class="card-body">
    <h5 class="card-title"> {{ Auth::user()->last_name}}, {{ Auth::user()->name}} </h5>
    <p class="card-text"> <a href="">Ver perfil</a></p>
  </div>
</div>
<!--  -->

    </div>
    @if(!empty($aPropieties))
    @foreach($aPropieties as $optype)
    
    <div class="container">
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
              <h3 class="card-title mt-2">  {{$optype->name}} </h3>
              <p class="card-text"> {{$optype->description}} </p>
                <!--  -->
                <div class="row row-caracs">
                  <h3> USD{{$optype->price}}</h3>
                  <span class="characteristic" data-toggle="tooltip" data-placement="top" title="3 Ambientes">{{$optype->rooms}}<i class="fas fa-home"></i></span>
                  <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Baño">1<i class="fas fa-toilet"></i></span>
                  <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Dormitorio">2<i class="fas fa-bed"></i></span>
                  <a href="{{ route('propietie',$optype->id) }}" class="btn btn-danger ml-auto mr-4 mb-4">Editar</a>
                  <a href="{{ route('propietie',$optype->id) }}" class="btn btn-danger  mb-4">Ver anuncio</a>
                </div>
                <!--  -->
            </div>
          </div>
          <!--  -->
        </div>
      
      </div>
      </div>
                 @endforeach
              
   
                
              @endif
              </div>


@include('frontend/layouts.footer')


@endsection