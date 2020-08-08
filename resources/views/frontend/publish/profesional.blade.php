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
                        <h1>Opciones para publicar</h1>
                        <div class="mt-3"> Elegí una opción para poder encontrar los planes que mas te sirvan</div>
                    </div>

                </div>
                <div class="row">
                    <!-- card1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                        <a href="">
                            <div class="card-body">
                                <img src="images/index/userej2.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>5 SIMPLES</h3>
                                <h3>$3.500</h3>
                                <h5>Plan mensual</h5>
                             <div class="d-flex flex-row justify-content-center">
                                 <div class="p-4">
                                     <a href="#">
                                     <i class="fa fa-calendar" aria-hidden="true"></i>
                                     </a>
                                 </div>
                                 <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-stop" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-low-vision" aria-hidden="true"></i>
                                    </a>
                                </div>
                             </div>
                             <button type="button" class="btn btn-outline-warning">Elegir</button>
                            </div>
                            </a>
                        </div>
                    </div>
                     <!-- card1 -->
                    <!-- card2 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <a href="">
                            <div class="card-body">
                                <img src="images/index/userej2.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>10 SIMPLES</h3>
                                <h3>$4.500</h3>
                                <h5> Plan mensual</h5>
                             <div class="d-flex flex-row justify-content-center">
                                 <div class="p-4">
                                     <a href="#">
                                     <i class="fa fa-calendar" aria-hidden="true"></i>
                                     </a>
                                 </div>
                                 <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-stop" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                             </div>
                             <button type="button" class="btn btn-outline-warning">Elegir</button>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- card2 -->
                            <!-- card3 -->
                            <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <a href="">
                            <div class="card-body">
                                <img src="images/index/userej2.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>10 SIMPLES</h3>
                                <h3>$9.619</h3>
                                <h5>Plan trimestral</h5>
                             <div class="d-flex flex-row justify-content-center">
                                 <div class="p-4">
                                     <a href="#">
                                     <i class="fa fa-calendar" aria-hidden="true"></i>
                                     </a>
                                 </div>
                                 <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-stop" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                             </div>
                             <button type="button" class="btn btn-outline-warning">Elegir</button>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- card3 -->
                            <!-- card4 -->
                            <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <a href="">
                            <div class="card-body">
                                <img src="images/index/userej2.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>5 DESTACADOS</h3>
                                <h3>$7.500</h3>
                                <h5>Plan mensual</h5>
                             <div class="d-flex flex-row justify-content-center">
                                 <div class="p-4">
                                     <a href="#">
                                     <i class="fa fa-calendar" aria-hidden="true"></i>
                                     </a>
                                 </div>
                                 <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-stop" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    </a>
                                </div>
                             </div>
                             <button type="button" class="btn btn-outline-warning">Elegir</button>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- card4 -->
                     
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
