@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
    <!-- Bootstrap CSS -->
      <!-- <link rel="stylesheet" href="css/frontend/publish1.css">  -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">  -->

    
 
           <!-- <div class="container"> -->
          <div class="container" id="container"> 
      
            <h2 style="margin-top: 5x;">Ahora a ponerlo lindo!</h2> 
            <p>Las propiedades con imagenes se venden más rápido</p> 
         
          
        <!-- empieza Seleccion de datos -->
            <div class="container mt-7">
        

                <!-- imagenes -->
                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Imagenes</a>
                          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Videos</a>
                          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Planos</a>
                        </div>
                      </nav>

                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          
                            <div class="col-lg-4 order-lg-1 text-center">
                            @if(!empty($aImages))
                            @foreach($aImages as $image)
                                <img src="/images/publish/{{$image->image}}" class="mx-auto img-fluid img-circle d-block" alt="Suba una imagen" style="margin-top:15px;">
                             @endforeach
                            @endif
                                <form method="POST" action="{{ route('upload_propietie_picture') }}" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="propietie_id" id="propietie_id" value="{{empty($propietie_id) ? '' : $propietie_id}}">
                                <label class="custom-file">
                                <input type="file" id="image" name="image" class="custom-file-input">
                                <span class="custom-file-control"><i class="fas fa-plus"></i>Elegir una foto</span>
                                </label>
                                </br>
                                </br>
                                <button class="btn btn-primary mt-5" type="submit">Subir foto</button>
                                </form>
                            </div>
                          

                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                          <div class="col-lg-4 order-lg-1 text-center">
                              <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar" style="margin-top:15px;">
                              <h6 class="mt-2">Agregar una video</h6>
                              <label class="custom-file">
                              <input type="file" id="video" name="video"class="custom-file-input">
                              <span class="custom-file-control"><i class="fas fa-plus"></i>Elegir una video</span>
                              </label>
                          </div>
                      

                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <div class="col-lg-4 order-lg-1 text-center">
                              <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar" style="margin-top:15px;">
                              <h6 class="mt-2">Agregar una Plano</h6>
                              <label class="custom-file">
                              <input type="file" id="file" class="custom-file-input">
                              <span class="custom-file-control"><i class="fas fa-plus"></i>Elegir un plano</span>
                              </label>
                          </div>
                        </div>
                    
                      </div>
                      <!-- imagenes -->
                      </br></br>

<hr><hr>

    <!-- INICIO DE DATOS VISIBLES OPCIONALES -->


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
                                <input type="checkbox" class="custom-control-input" name="servicios[]" value="{{$servicios->id}}">
                                <label class="custom-control-label" for="servicios[]">{{$servicios->name}}</label>
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
                              <input type="checkbox" class="custom-control-input" name ="car[]" value="{{$car->id}}">
                              <label class="custom-control-label" for="car[]">{{$car->name}}</label>
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
                              <input type="checkbox" class="custom-control-input" name="amb[]" value="{{$amb->id}}">
                              <label class="custom-control-label" for="amb[]">{{$amb->name}}</label>
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
                              <input type="checkbox" class="custom-control-input"  name="com[]" value="{{$com->id}}">
                              <label class="custom-control-label" for="com[] ">{{$com->name}}</label>
                            </div>
                          </a>
                        @endforeach
                        </div>
                        <!-- Basic dropdown -->
                                  @endif
                                  </div>
                    <!-- fin comodidades -->
                    <!-- <button type="button" class="btn btn-primary mt-5 mb-3">Siguiente</button> -->
                      </div> 

                  <!-- FIN DE DATOS VISIBLES OPCIONALES -->
                      </br>

                      <button type="button" class="btn btn-link mt-7">PUBLICAR</button>
                    

              </div>
          </div> 



  @include('frontend/layouts.footer')
  @endsection
