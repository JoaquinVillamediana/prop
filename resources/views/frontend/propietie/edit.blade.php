@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')


<link rel="stylesheet" href="/css/frontend/product.css">
<div class="mt-5 pb-5 container-fluid">

  @if(!empty($aProp))
  @foreach($aProp as $prop)

  <div class="container">
    <div class="row">
    
      <div class="col-md-7 col-12">
      
          <!-- Características  -->
          <form method="POST" action="{{ route('update_propietie', $prop->id) }}" role="form" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <label for="name">Título</label>
              <input id="name" name="name" type="text" class="form-control ml-4" aria-label="Text input with dropdown button" placeholder="{{ $prop->name }}"> 
         
              <!-- Precio -->

              <div class="container mt-5">
                <label for="currency_id">Precio</label>
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
                      <input type="number" id="price" name="price" class="form-control" aria-label="Text input with dropdown button" placeholder="{{ $prop->currency_name }} {{ number_format($prop->price, 0, ',', '.')  }}">
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

              <!-- Pequeña introducción para poner en el inicio (fijarse si es totalmente necesario) -->
                                    
              <label for="introduccion">Introduccion</label>
              <textarea id="introduccion" name="introduccion" rows="4" cols="50">{{ $prop->description }}</textarea>

              <!-- FIN DE LA Pequeña introducción para poner en el inicio (fijarse si es totalmente necesario) -->

              </br>                                           

              <!-- DESCRIPCION DE LA PROPIEDAD  -->

              <label for="descripcion"> Descripción</label>
              <textarea id="descripcion" name="descripcion" rows="4" cols="50">{{ $prop->description }}</textarea>
                                  
              <!-- FIN DE LA DESCRIPCION -->
            
          </div>
          <div class="characteristcs-div" style="border: 1px solid #ccc!important;">
            <div class="container">
              <h4>Caracteristicas</h4>
              <ul class="characteristcs">
                <li class="carac-item"><span class="carac-desc"><i
                      class="fas fa-couch"></i>Cuartos</span>{{ $prop->rooms }} </li>
                <li class="carac-item"><span class="carac-desc"><i
                      class="fas fa-bed"></i>Habitaciones</span>{{ $prop->bedrooms }}</li>
                <li class="carac-item"><span class="carac-desc"><i
                      class="fas fa-bath"></i>Baños</span>{{ $prop->bathrooms }}</li>
                <li class="carac-item"><span class="carac-desc"><i
                      class="fas fa-ruler-combined"></i>Tamaño</span>{{ $prop->rooms }}m<sup>2</sup></li>
              </ul>
            </div>
          </div>

          <div class="card bg-light mb-3 mt-2"
            style="  font-weight: bold;    border: 1px solid #ccc!important;">
            <div class="card-body">
              <h5 class="card-title">Descripción</h5>
              <p class="card-text">{{ $prop->description }}</p>
            </div>
          </div>

          <!-- Fin de características  -->
          
          <!-- Caracteristicas generales  -->

          @if(!empty($aPropieties_caracteristicas_generales))
          <div class="characteristcs-div" style="border: 1px solid #ccc!important;">
            <div class="container">
              <h4>Caracteristicas Generales</h4>
              <ul class="characteristcs">
               @foreach($aPropieties_caracteristicas_generales as $cg)
                <li class="carac-item"><span class="carac-desc">
                <i class="fas fa-angle-right"></i></span>{{ $cg->caracteristicas_generales_name }} 
                </li>
               @endforeach
              </ul>
            </div>
          </div>
          @endif
            <!-- fin de caracteristicas generales  -->


            <!-- servicios -->
            @if(!empty($aPropieties_services))
            <div class="characteristcs-div" style="border: 1px solid #ccc!important; margin-top: 8px;">
                        <div class="container">
                          <h4>Servicios</h4>
                          <ul class="characteristcs">
                          @foreach($aPropieties_services as $servicios)
                            <li class="carac-item"><span class="carac-desc">
                            <i class="fas fa-angle-right"></i></span>{{ $servicios->service_name }} </li>
                          @endforeach
                          </ul>
                        </div>
                      </div>
                @endif
            <!--  fin de serivicios-->

            <!--  ambientes-->
            @if(!empty($aPropieties_ambientes))
            <div class="characteristcs-div" style="border: 1px solid #ccc!important; margin-top: 8px;">
                        <div class="container">
                          <h4>Ambientes</h4>
                          <ul class="characteristcs">
                           @foreach($aPropieties_ambientes as $ambientes)
                            <li class="carac-item"><span class="carac-desc">
                            <i class="fas fa-angle-right"></i></span>{{ $ambientes->ambientes_name }} </li>
                           @endforeach
                          </ul>
                        </div>
                      </div>
              @endif
            <!--   fin de ambientes-->

            <!--   comodidades-->
            @if(!empty($aPropieties_comodidades))
            <div class="characteristcs-div" style="border: 1px solid #ccc!important; margin-top: 8px;">
                        <div class="container">
                          <h4>Comodidades</h4>
                          <ul class="characteristcs">
                          @foreach($aPropieties_comodidades as $comodidades)
                            <li class="carac-item"><span class="carac-desc"><i class="fas fa-angle-right"></i></span>{{ $comodidades->comodidades_name }} </li>
                           @endforeach
                          </ul>
                        </div>
                      </div>

              @endif
            <!--  fin de comodidades-->

        {{-- </div> --}}

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
                                <button type="submit"> Editar</button>
                                </div>
                               
      </div>
      <!-- FIN DE COLUMNA DE CARACTERÍSTICAS Y DE FOTOS -->

      <!-- COLUMNA DE FORMULARIO DE CONTACTO Y USUARIO -->
   



      @endforeach
      @endif
      </form>
    </div>


  </div>











  <script>
    function changeMainImage(id,type){
  if(type == 'image')
  {
    url = "/uploads/products/"+id;
    $('.main-image').attr('src',url);
    $('.main-video').attr('src','');
    $('.main-video').css('display','none');
    $('.main-image').css('display','block');
  }
  else
  {
    url = "/uploads/products/"+id;
    $('.main-video').attr('src',url);
    $('.main-image').attr('src','');
    $('.main-video').css('display','block');
    $('.main-image').css('display','none');
  }
  
}

  
  </script>



  <script type="text/javascript">
    function setFavoriteProductResponse(data) {
    
      if(data.favorite > 0) {
          $('#favBtnActive_'+data.productId).css('display', 'block');
          $('#favBtn_'+data.productId).css('display', 'none');
          
      } 
      else{
        $('#favBtnActive_'+data.productId).css('display', 'none');
        $('#favBtn_'+data.productId).css('display', 'block');
      }
  }
  
  function ajaxRequest(type, url, params, callBack) {

      jQuery.support.cors = true;
      params = JSON.stringify(params);

      $.ajax({
          type: type,
          url: url,
          data: params,
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          beforeSend: function () {
              //$('#ajaxLoader').show();
          },
          complete: function () {
              //$('#ajaxLoader').hide();
          },
          success: function (data) {
             //console.log("REQUEST [ " + type + " ] [ " + url + " ] SUCCESS");
             //console.log(data);
              window[callBack](data);
          },
          error: function (msg, url, line) {
             //console.log('ERROR !!! msg = ' + msg + ', url = ' + url + ', line = ' + line);
          }
      });
  }



  </script>
  <script src="/vendor/bootstrap-input-spinner.js"></script>
  <script>
    $("input[type='number']").inputSpinner()
  </script>

  @include('frontend/layouts.footer')


  @endsection