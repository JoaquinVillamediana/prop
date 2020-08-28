@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
    <!-- Bootstrap CSS -->
      <!-- <link rel="stylesheet" href="css/frontend/publish1.css">  -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">  -->

    
 
           <!-- <div class="container"> -->
          <div class="container" id="container"> 
      
            <h2>Ahora a ponerlo lindo!</h2> 
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
                                <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                                <h6 class="mt-2">Agregar una foto</h6>
                                <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input">
                                <span class="custom-file-control"><i class="fas fa-plus"></i>Elegir una foto</span>
                                </label>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                          <div class="col-lg-4 order-lg-1 text-center">
                              <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                              <h6 class="mt-2">Agregar una video</h6>
                              <label class="custom-file">
                              <input type="file" id="file" class="custom-file-input">
                              <span class="custom-file-control"><i class="fas fa-plus"></i>Elegir una video</span>
                              </label>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                          <div class="col-lg-4 order-lg-1 text-center">
                              <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                              <h6 class="mt-2">Agregar una Plano</h6>
                              <label class="custom-file">
                              <input type="file" id="file" class="custom-file-input">
                              <span class="custom-file-control"><i class="fas fa-plus"></i>Elegir un plano</span>
                              </label>
                          </div>
                        </div>
                    
                      </div>
                      <!-- imagenes -->
                      <button type="button" class="btn btn-link">Cargar archivos y seguir</button>

              </div>
          </div> 



  @include('frontend/layouts.footer')
  @endsection
