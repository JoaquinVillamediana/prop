@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
    <!-- Bootstrap CSS -->
      <!-- <link rel="stylesheet" href="css/frontend/publish1.css">  -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">  -->

    
 
           <!-- <div class="container"> -->
          <div class="container" id="container"> 
      
            <h2>Ya casi esta todo listo!</h2> 
            <p>Contale a la gente los ultimos detalles de tu propiedad</p> 
         
          <!-- servicios -->
           <div class="container">
            
             
              <!-- Basic dropdown -->
              @if(!empty($aServicios))
              <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Servicios</button>

              
              <div class="dropdown-menu">
@foreach($aServicios as $servicios)
                <a class="dropdown-item">
                  <!-- Default unchecked -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkbox1">
                    <label class="custom-control-label" for="checkbox1">{{$servicios->name}}</label>
                  </div>
                </a>
              @endforeach
              </div>
              @endif
              <!-- Basic dropdown -->
                        </div>
          <!-- fin servicios -->

            

            <!-- características generales -->
            <div class="container mt-3">
            
             @if(!empty($aCaracteristocasg))
            <!-- Basic dropdown -->
            <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Características generales</button>

            <div class="dropdown-menu">
            @foreach($aCaracteristocasg as $car)
              <a class="dropdown-item">
                <!-- Default unchecked -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkbox1">
                  <label class="custom-control-label" for="checkbox1">{{$car->name}}</label>
                </div>
              </a>
            @endforeach
            </div>
            @endif
            <!-- Basic dropdown -->
                      </div>
        <!-- fin caracteristicas genrales -->
        
         <!-- ambientes -->
         <div class="container mt-3">
            @if(!empty($aAmbientes))
             
            <!-- Basic dropdown -->
            <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Ambientes</button>

            <div class="dropdown-menu">
            @foreach($aAmbientes as $amb)
              <a class="dropdown-item">
                <!-- Default unchecked -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkbox1">
                  <label class="custom-control-label" for="checkbox1">{{$amb->name}}</label>
                </div>
              </a>
            @endforeach
            </div>
            <!-- Basic dropdown -->
                      @endif
                      </div>
        <!-- fin ambienbte -->

         <!-- comodidades -->
         <div class="container mt-3">
            @if(!empty($aComodidades))
             
            <!-- Basic dropdown -->
            <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Comodidades</button>

            <div class="dropdown-menu">
              @foreach($aComodidades as $com)
              <a class="dropdown-item">
                <!-- Default unchecked -->
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checkbox1">
                  <label class="custom-control-label" for="checkbox1">{{$com->name}}</label>
                </div>
              </a>
            @endforeach
            </div>
            <!-- Basic dropdown -->
                      @endif
                      </div>
        <!-- fin comodidades -->
        <button type="button" class="btn btn-primary mt-5 mb-3">Siguiente</button>
          </div> 



  @include('frontend/layouts.footer')
  @endsection
