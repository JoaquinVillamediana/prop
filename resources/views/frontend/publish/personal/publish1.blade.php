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
            <form method="POST" action="{{ route('store1') }}" >
                  
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


                      <button class="btn btn-primary mt-5" type="submit">Guardar y continuar</button>
                 
                      </form>
                      <!--  -->
                      <a class="btn btn-primary" href="{{ route('publish_personal_free2') }}" role="button">Continuar sin guardar</a>



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
