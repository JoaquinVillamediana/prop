@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/frontend/publish/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    
  <body>

    <section id="team">
        <div class="container my-3 py-5 text-center">
                <div class="row mb-5">
                    <div class="col">
                        <h1>Encontrá ayuda para los inconvenientes</h1>
                        <div class="mt-3"> 
                            Aquí se encuentran respondidas las preguntas mas frecuentes que se le generana  a los usuarios
                    </div>
                       
                    </div>

                </div>
                <div class="row">
             
                    <!-- card1 -->
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="card">               
                            <div class="card-body" >                            
                                <h3>PREGUNTAS FRECUENTES</h3>      
                                <a class="btn btn-outline-warning" href="{{ route('frecuentes') }}" role="button">Elegir</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">               
                            <div class="card-body" >                            
                                <h3>INFORMACIÓN PUBLICITARIA</h3>      
                                <a class="btn btn-outline-warning" href="{{ route('publish_questions') }}" role="button">Elegir</a>
                            </div>

                        </div>
                    </div>
                    </div>
                    <h1>Legales</h1>
                    </br>
                    
                <div class="row">
                     <!-- card1 -->
                          <!-- card1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">               
                            <div class="card-body" >                            
                                <h3>TERMINOS Y CONDICIONES DE USO</h3>      
                                <a class="btn btn-outline-warning" href="{{ route('tycdu') }}" role="button">Elegir</a>
                            </div>

                        </div>
                    </div>
                  
                     <!-- card1 -->
                    
                          <!-- card1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">               
                            <div class="card-body" >                            
                                <h3>TÉRMINOS Y CONDICIONES DE CONTRATO</h3>      
                                <a class="btn btn-outline-warning" href="{{ route('tycdc') }}" role="button">Elegir</a>
                            </div>

                        </div>
                    </div>
                     <!-- card1 -->
                          <!-- card1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">               
                            <div class="card-body" >                            
                                <h3>POLÍTICA DE PRIVACIDAD</h3>      
                                <a class="btn btn-outline-warning" href="{{ route('pdp') }}" role="button">Elegir</a>
                            </div>

                        </div>
                    </div>
                     <!-- card1 -->
                          <!-- card1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">               
                            <div class="card-body" >                            
                                <h3>POLÍTICA DE GESTIÓN DE CALIDAD</h3>      
                                <a class="btn btn-outline-warning" href="{{ route('pdgdc') }}" role="button">Elegir</a>
                            </div>

                        </div>
                    </div>
                     <!-- card1 -->
                  
                </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
  </body>


@include('frontend/layouts.footer')
@endsection