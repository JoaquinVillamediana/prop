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
                                      
                                          @if(!empty($aCurrency))
                                            @foreach($aCurrency as $moneda)
                                          
                                             <p>{{$moneda->name}}</p> <input type="checkbox" id="currency_id" name="currency_id">
                               
                                              @endforeach   
                                          @endif
                                       
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
                             

                              </div> 




                    <!-- FIN DE DATOS VISIBLES DE LA PUBLICACION -->


                      <hr>
                      <hr>

              
                      <hr>
                      <hr>

                      <button class="btn btn-primary mt-5" type="submit">Guardar y seguir</button>
                 <!--  -->
                      </form>
                      <!--  -->
                     


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
