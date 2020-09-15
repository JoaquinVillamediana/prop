@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')
<link rel="stylesheet" href="css/frontend/profile_users.css">
@if(!empty($aUser))
@foreach($aUser as $data_user)
<div class="container-prueba mt-4 mb-2">
    <h1 style="text-align:center;">
    {{ $data_user->name }}
    </h1>
    </br>
    
</div>
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
              
              
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3" style="font-weight: bold;">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 style="font-weight: bold;">Nombre</h6>
                            <p>
                            {{ $data_user->last_name }}  , {{ $data_user->last_name }} 
                            </p>
                            <h6 style="font-weight: bold;">Teléfono</h6>
                            <p>
                                @if(!empty($data_user->phone))
                            {{ $data_user->phone }} @else {{"El usuario no cargo su número de teléfono."}}@endif
                            </p>
                            <h6 style="font-weight: bold;">Email</h6>
                            <p>
                            @if(!empty($data_user->email))
                            {{ $data_user->email }} @else {{"El usuario no cargo su email."}}@endif
                            </p>
                        </div>
                        <div class="col-md-6">
                         
                            
                            @if($data_user->countprop != 0)
                            <a href="#props" class="badge badge-dark badge-pill">{{ $data_user->countprop }} Publicaciones</a>
                            @else 
                            <a href="#" class="badge badge-dark badge-pill">Este usuario no tiene publicaciones activas</a>
                            @endif
                          
                        
                            
                        </div>
                        
                    </div>
                    <!--/row-->
                </div>
               
                
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="/images/profile_pictures_users/{{$data_user->profile_image}}" class="mx-auto img-fluid img-circle d-block" alt="Profile_imagen">
            
        </div>
    </div>


<!-- carrousel  -->
@if(!empty($aProperties))
<section id="props" class="mt-4">

  <div class="container">
    <div class="row">
      <div class="col text-center text-uppercase">
        <small> Mira todas las propiedades de </small>
        <h2> {{ $data_user->name }} ({{ $data_user->countprop }})</h2>



      </div>




    </div>

    
    @if(!empty($aProperties))
<div class="row">
  @foreach ($aProperties as $prop)
      <div class="col-md-4 mb-4 propertie">
      {{-- <a href="{{ route('propietie') }}"> --}}
        <div class="card">
          <div class="image">
            <img src="/images/publish/{{$prop->image}}" class="card-img-top" alt="No se encontro la imagen">

            <div class="row row-caracs">

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="{{$prop->rooms}} Ambientes">{{$prop->rooms}}<i class="fas fa-home"></i></span>

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="{{$prop->bathrooms}} Baños">{{$prop->bathrooms}}<i class="fas fa-toilet"></i></span>

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="{{$prop->bedrooms}} Dormitorios">{{$prop->bedrooms}}<i class="fas fa-bed"></i></span>
            </div>
            
          </div>

          
          <div class="card-body">
            <h5 class="card-title mb-1"> {{$prop->name}}</h5>
            <h5 class="card-title mb-1"><b>{{$prop->symbol}}</b> {{ number_format($prop->price, 0, ',', '.')  }}</h5>
            <p class="card-text">{{$prop->introduction}}.</p>
            <a href="{{ route('propietie',$prop->id) }}" class="btn btn-moreinfo">Más información</a>
          </div>
        </div>
        {{-- </a> --}}
      </div>

      

    
      @endforeach
      <div class="pag col-12">
        {{ $aProperties->links() }}
      </div>

    </div>
    @endif
<script>$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</script>
    
    <script src="/js/home.js"></script>

  </div>
</section>
@endif
<!--  -->


</div>
@endforeach
@endif
@include('frontend/layouts.footer')


@endsection