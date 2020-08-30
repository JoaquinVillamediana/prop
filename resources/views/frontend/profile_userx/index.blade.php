@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')
<link rel="stylesheet" href="css/frontend/profile_users.css">
@if(!empty($aUser))
@foreach($aUser as $data_user)
<div class="container-prueba mt-4 mb-2">
    <h1>
    {{ $data_user->name }} -     @if($data_user->type == 2)
                            Particular 
                            @else 
                            Profesional
                            @endif
    </h1>
    
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
                            <h6>Etiquetas</h6>
                            @if($data_user->type == 2)
                            <a href="#" class="badge badge-dark badge-pill">Particular</a> 
                            @else 
                            <a href="#" class="badge badge-dark badge-pill">Profesional</a>
                            @endif
                            
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
@if(!empty($aPropieties))
<section id="props" class="mt-4">

  <div class="container">
    <div class="row">
      <div class="col text-center text-uppercase">
        <small> Mira todas las propiedades de </small>
        <h2> {{ $data_user->name }} ({{ $data_user->countprop }})</h2>



      </div>




    </div>

    
    @if(!empty($aPropieties))
<div class="row">
  @foreach ($aPropieties as $prop)
  @if($prop->user_id ==  $data_user->id)
      <div class="col-md-4 mb-4 propertie">
      {{-- <a href="{{ route('propietie') }}"> --}}
        <div class="card">
          <div class="image">
            <img src="images/index/home1.jpg" class="card-img-top" alt="...">

            <div class="row row-caracs">

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="3 Ambientes">3<i class="fas fa-home"></i></span>

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Baño">1<i class="fas fa-toilet"></i></span>

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Dormitorio">1<i class="fas fa-bed"></i></span>
            </div>
            
          </div>

          <div class="card-body">
            <h5 class="card-title mb-0"> {{$prop->name}}</h5>

            <p class="card-text">{{$prop->description}}.</p>
            <a href="{{ route('propietie',$prop->id) }}" class="btn btn-moreinfo">Más información</a>
          </div>
        </div>
        {{-- </a> --}}
      </div>

      
@endif
    
      @endforeach
    </div>
    @endif
<script>$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</script>
    


  </div>
</section>
@endif
<!--  -->


</div>
@endforeach
@endif
@include('frontend/layouts.footer')


@endsection