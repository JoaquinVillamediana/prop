@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
    <!-- Bootstrap CSS -->
      <!-- <link rel="stylesheet" href="css/frontend/publish1.css">  -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">  -->

    
 
           <!-- <div class="container"> -->
          <div class="container" id="container"> 
      
            <h2>Ya casi esta todo listo!</h2> 
            <p>Contale a la gente como es tu propiedad</p> 
         
          
        <!-- empieza Seleccion de datos -->
            <div class="container mt-7">
        
            
            <!-- Titulo de la publicacion -->
                <h4>Titulo(*)</h4>            
                <input type="text" class="form-control" aria-label="Text input with checkbox" style="width: 50%;">
            <!-- Fin del titulo de la publicacion -->

            <!-- Pequeña introducción para poner en el inicio (fijarse si es totalmente necesario) -->
            
            <h4  style="margin-top:10px;">Introducción(*)</h4>  
            <textarea id="desc" name="desc" rows="4" cols="50">Te recomendamos escribir un minímo de 100 caracteres.</textarea>

            <!-- FIN DE LA Pequeña introducción para poner en el inicio (fijarse si es totalmente necesario) -->
              
              
              <!-- DESCRIPCION DE LA PROPIEDAD  -->

              <h4  style="margin-top:10px;">Descripción(*)</h4>
              <textarea id="desc" name="desc" rows="4" cols="50">Te recomendamos escribir un minímo de 100 caracteres.</textarea>
              
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
                          <a class="dropdown-item" href="#">{{$moneda->name}}</a>
                          @endforeach   
                      @endif
                      </div>
                      <input type="number" class="form-control" aria-label="Text input with dropdown button">
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
                    <input type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" >
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
                <input type="Number" aria-label="1" class="form-control">
              
            </div>
            <!-- FIN DE AMBIENTES -->

                        <!-- CANTIDAD DE DORMITORIOS -->
                        <div class="input-group" style="width: 50%;">
              <div class="input-group-prepend">
                <span class="input-group-text">Dormitorios</span>
              </div>
                <input type="Number" aria-label="1" class="form-control">
              
            </div>
            <!-- FIN DE dormitorios -->

                        <!-- CANTIDAD DE baños -->
                        <div class="input-group"style="width: 50%;">
              <div class="input-group-prepend">
                <span class="input-group-text">Baños</span>
              </div>
                <input type="Number" aria-label="1" class="form-control">
              
            </div>
            <!-- FIN DE baños -->

                        <!-- CANTIDAD DE Cocheras -->
                        <div class="input-group" style="width: 50%;">
              <div class="input-group-prepend">
                <span class="input-group-text">Cocheras</span>
              </div>
                <input type="Number" aria-label="1" class="form-control">
              
            </div>
            <!-- FIN DE Cocheras -->

                        <!-- CANTIDAD DE Toilettes -->
                        <div class="input-group" style="width: 50%;">
              <div class="input-group-prepend">
                <span class="input-group-text">Toilettes</span>
              </div>
                <input type="Number" aria-label="1" class="form-control">
              
            </div>
            <!-- FIN DE Toilettes -->

            </div>

            <!-- FIN DE CANTIDAD DE CADA COSA -->


            <!-- Antiguedad -->


            <div class="container mt-5">
            <h3>Antiguedad (*)</h3>
            <p> A estrenar</p> <input type="checkbox">
            <p> Años</p> <input type="checkbox"> <!-- Agregar cantidad de años --> 
            
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
                <input type="text" class="form-control" placeholder="Total (*)">
              </div>
            </div>
            </div>
            <!-- fin de la superficie -->
              
            </div>
            <button type="button" class="btn btn-primary mt-5 mb-5">Continuar</button>
            <a class="btn btn-primary" href="{{ route('publish_personal_free4') }}" role="button">Continuar sin guardar</a>

          </div> 



  @include('frontend/layouts.footer')
  @endsection
