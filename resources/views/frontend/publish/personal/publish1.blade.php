@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
    <!-- Bootstrap CSS -->
      <!-- <link rel="stylesheet" href="css/frontend/publish1.css">  -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">  -->

    
 
           <!-- <div class="container"> -->
          <div class="container" id="container"> 
      
            <h2>¡Es un gusto tenerte con nosotros!</h2> 
            <p>Empecemos por lo básico: Agregá el tipo de propiedad y su ubicación.</p> 
         
          
        <!-- empieza Seleccion de datos -->
            <div class="container">
            <form method="POST" action="{{ route('store1') }}" enctype="multipart/form-data">
            <!--  -->
            {{ csrf_field() }}
                  <div class="row">

                    <!--  Dropdown tipo de propiedad-->
                    @if(!empty($aOperationType))
                      <p>Qué tipo de operación querés hacer?</p>
                      <select name="operation" id="operation"  class="rounded" >
                        @foreach($aOperationType as $optype)
                          <option value="{{$optype->id}}">{{$optype->name}}</option>
                        @endforeach
                      </select>   
                    @endif
                  
                  <!-- Fin de tipo de propiedad -->
                  
                  <!--  Dropdown tipo de propiedad-->
                  @if(!empty($aPropietie_type))
                      <p>Qué tipo de propiedad querés publicar?</p>
                      <select name="building" id="building"  class="rounded" style="margin-left: 8xp; margin-right: 10xp;">
                        @foreach($aPropietie_type as $optype)
                          <option value="{{$optype->id}}">{{$optype->name}}</option>
                        @endforeach
                      </select>   
                    @endif
                    </div>
                  <!-- Fin de tipo de propiedad -->
                  <!-- Localidades -->
       
                      @if(!empty($aLocalities))
                      </br>                  
                      </br>
                          <p>Ubicación(*)</p> 
                    
                          <input placeholder="Ubicacion:" type="text" name="text" id="location" autocomplete="off" style="width:50%;">
                          <input type="hidden" name="locality" value="" id="locality">
                          <div class="options">
                          
                          </div>
                      @endif
                      <!-- Fin de locaclidades -->
                      </br>                  
                      </br>
                      <p>Ingresar dirección</p>
                      <input type="text" id="direction" name="direction"placeholder="Dirección" style="width:50%;">

                      <!--Fin de localidades  -->
                      </br>

                      <hr>
                      <hr>




                      <!-- SECCION ARCHIVOS ADJUNTOS -->




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
                                                    <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar" style="margin-top:15px;">
                                                    <h6 class="mt-2">Agregar una foto</h6>
                                                    <label class="custom-file">
                                                    <input type="file" id="image"  name="image" class="custom-file-input">
                                                    @if ($errors->has('image'))
                            <span id="image_error_lrv" class="invalid-feedback" role="alert" style="display:block;">
                                <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                            </span>
                            @endif
                            <span id="image_error" class="invalid-feedback" role="alert" style="display:none;">
                                <strong>Debe cargar una imagen ( .jpeg, .jpg, .png, .gif ).</strong>
                            </span>
                                                    <span class="custom-file-control"><i class="fas fa-plus"></i>Elegir una foto</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                              <div class="col-lg-4 order-lg-1 text-center">
                                                  <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar" style="margin-top:15px;">
                                                  <h6 class="mt-2">Agregar una video</h6>
                                                  <label class="custom-file">
                                                  <input type="file" id="file" class="custom-file-input">
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
                                          <!-- <button type="button" class="btn btn-link mt-7">Cargar archivos</button> -->
                                          <!-- <a class="btn btn-primary" href="{{ route('publish_personal_free3') }}" role="button">Continuar sin guardar</a> -->

                                  </div>
                              </div> 


                          <!-- FIN DE SECCION ARCHIVOS ADJUNTOS -->

                      <hr>
                      <hr>


                    <!-- INICIA DATOS VISIBLES DE LA PUBLICACION -->

                    
                                    <!-- <div class="container"> -->
                                    <div class="container" id="container"> 
                                
                                <h2>Ya casi esta todo listo!</h2> 
                                <p>Contale a la gente como es tu propiedad</p> 
                            
                              
                            <!-- empieza Seleccion de datos -->
                                <div class="container mt-7">
                            
                                
                                <!-- Titulo de la publicacion -->
                                    <h4>Titulo(*)</h4>            
                                    <input type="text" name="titulo" id="titulo" class="form-control" aria-label="Text input with checkbox" style="width: 50%;">
                                <!-- Fin del titulo de la publicacion -->

                                <!-- Pequeña introducción para poner en el inicio (fijarse si es totalmente necesario) -->
                                
                                <h4  style="margin-top:10px;">Introducción(*)</h4>  
                                <textarea id="introduccion" name="introduccion" rows="4" cols="50">Te recomendamos escribir un minímo de 100 caracteres.</textarea>

                                <!-- FIN DE LA Pequeña introducción para poner en el inicio (fijarse si es totalmente necesario) -->
                                  
                                  
                                  <!-- DESCRIPCION DE LA PROPIEDAD  -->

                                  <h4  style="margin-top:10px;">Descripción(*)</h4>
                                  <textarea id="descripcion" name="descripcion" rows="4" cols="50">Te recomendamos escribir un minímo de 100 caracteres.</textarea>
                                  
                                  <!-- FIN DE LA DESCRIPCION -->

                                <!-- Precio -->

                                <div class="container mt-5">
                                  <h3>Precio(*)</h3>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Moneda</button>
                                          <div class="dropdown-menu">
                                          @if(!empty($aCurrency))
                                            @foreach($aCurrency as $moneda)    
                                              <a class="dropdown-item" value="{{$moneda->id}}" id="currency_id" name="currency_id" href="#">{{$moneda->name}}</a>
                                              @endforeach   
                                          @endif
                                          </div>
                                          <input type="number" id="price" name="price" class="form-control" aria-label="Text input with dropdown button">
                                      </div>
                                    </div>
                                </div>

                                <!--FIN DE PRECIO EN SI  -->
                                <div class="container">
                                  <p>Agregar Expensas </p>
                                    <div class="input-group" style="width: 50%;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>                  
                                        </div>
                                        <input type="number" id="expensas"name="expensas" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" >
                                    </div>
                                </div>

                            <!-- fin de sector de precios con la opcion de expensas -->

                              <!--  Opciones de compra -->
                                <div class="container" style="margin-top:10px;">
                                  <p> Apto crédito</p> <input type="checkbox">
                                  <p> Apto Financiación</p> <input type="checkbox">
                                </div>
                              <!-- FIN DE Opciones de compra -->

                                <!-- CANTIDAD DE CADA COSA -->
                                <div class="container">
                                <h3>Espacios</h3>
                              
                                <!-- CANTIDAD DE AMBIENTES -->
                                <div class="input-group" style="width: 50%;" >
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Ambientes</span>
                                  </div>
                                    <input type="Number" id="rooms" name="rooms" aria-label="1" class="form-control">
                                  
                                </div>
                                <!-- FIN DE AMBIENTES -->

                                            <!-- CANTIDAD DE DORMITORIOS -->
                                            <div class="input-group" style="width: 50%;">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Dormitorios</span>
                                  </div>
                                    <input type="Number" id="bedrooms" name="bedrooms" aria-label="1" class="form-control">
                                  
                                </div>
                                <!-- FIN DE dormitorios -->

                                            <!-- CANTIDAD DE baños -->
                                            <div class="input-group"style="width: 50%;">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Baños</span>
                                  </div>
                                    <input type="Number" id="bathroooms" name="bathroooms" aria-label="1" class="form-control">
                                  
                                </div>
                                <!-- FIN DE baños -->

                                            <!-- CANTIDAD DE Cocheras -->
                                            <div class="input-group" style="width: 50%;">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Cocheras</span>
                                  </div>
                                    <input type="Number" id="garages" name="garages" aria-label="1" class="form-control">
                                  
                                </div>
                                <!-- FIN DE Cocheras -->

                                            <!-- CANTIDAD DE Toilettes -->
                                            <div class="input-group" style="width: 50%;">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Toilettes</span>
                                  </div>
                                    <input type="Number" id="toilettes" name="toilettes" aria-label="1" class="form-control">
                                  
                                </div>
                                <!-- FIN DE Toilettes -->

                                </div>

                                <!-- FIN DE CANTIDAD DE CADA COSA -->


                                <!-- Antiguedad -->


                                <div class="container mt-5">
                                <h3>Antiguedad (*)</h3>
                                <p> A estrenar</p> <input type="checkbox" value="0" id="years" name="years">
                                <p> Años</p> <input type="checkbox" value="1" id="years" name="years"> <!-- Agregar cantidad de años --> 
                                
                                </div>

                                <!-- fin de antiguedad -->

                                <!-- Superficie -->
                                <div class="container mt-5">
                                <h3>¿Cuál es la superficie? (*)</h3>
                                <div class="row">
                                  <div class="col">
                                    <input type="text" class="form-control" placeholder="Counstruida">
                                  </div>
                                  <div class="col">
                                    <input type="text" class="form-control" id="size" name="size"placeholder="Total (*)">
                                  </div>
                                </div>
                                </div>
                                <!-- fin de la superficie -->
                                  
                                </div>
                                <!-- <button type="button" class="btn btn-primary mt-5 mb-5">Continuar</button>
                                <a class="btn btn-primary" href="{{ route('publish_personal_free4') }}" role="button">Continuar sin guardar</a> -->

                              </div> 




                    <!-- FIN DE DATOS VISIBLES DE LA PUBLICACION -->


                      <hr>
                      <hr>

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
                                <input type="checkbox" class="custom-control-input" id="checkbox_servicios" name="checkbox_servicios" value="{{$servicios->id}}">
                                <label class="custom-control-label" for="checkbox_servicios">{{$servicios->name}}</label>
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
                              <input type="checkbox" class="custom-control-input" id="checkbox_cargen" name ="checkbox_cargen" value="{{$car->name}}">
                              <label class="custom-control-label" for="checkbox_cargen">{{$car->name}}</label>
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
                              <input type="checkbox" class="custom-control-input" id="checkbox_ambientes" name="checkbox_ambientes" value="{{$amb->id}}">
                              <label class="custom-control-label" for="checkbox_ambientes">{{$amb->name}}</label>
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
                              <input type="checkbox" class="custom-control-input" id="checkbox_comodidades" name="checkbox_comodidades" value="{{$com->name}}">
                              <label class="custom-control-label" for="checkbox_comodidades">{{$com->name}}</label>
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
                      <hr>
                      <hr>

                      <button class="btn btn-primary mt-5" type="submit">Publicar</button>
                 <!--  -->
                      </form>
                      <!--  -->
                      <!-- <a class="btn btn-primary" href="{{ route('publish_personal_free2') }}" role="button">Continuar sin guardar</a> -->



              </div>
          </div> 

<script>
  var localities = <?php  echo json_encode($aLocalities); ?>;
  $('.options').hide();
  var aLocalities = localities.map((element) => {
    return element.nombre;
  });
  
  $('#location').on("input",() => {
    displayLocalities($('#location'));
    
  });

 
</script>
<script src="/js/functions.js"></script>

  @include('frontend/layouts.footer')
  @endsection
