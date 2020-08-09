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
                @if(!empty($aPlans))
                @foreach($aPlans as $planes)
                    <!-- card1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                        @if (empty(Auth::user()->id))
                        <a href="{{ route('pago',$planes->id) }}">
                        @else
                        <a href="{{ route('publish_personal_free') }}">
                        @endif
                            <div class="card-body">
                                <img src="images/index/userej.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>{{ $planes->num_add }} AVISO</h3>
                                <h3> ${{ $planes->price }}</h3>
                                <h5> Plan {{ $planes->time }}</h5>
                                <h5> Plan {{ $planes->description1 }}</h5>
                                <h5> Plan {{ $planes->description2 }}</h5>
                                <h5> Plan {{ $planes->description3 }}</h5>
                             <div class="d-flex flex-row justify-content-center">
                                 <div class="p-4">
                                     <a href="#">
                                         <i class="fa fa-facebook"></i>
                                     </a>
                                 </div>
                                 <div class="p-4">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </div>

                             </div>
                             <button type="button" class="btn btn-outline-warning">Elegir</button>
                        
                            </div>
                            </a>
                        </div>
                    </div>
                     <!-- card1 -->
                   @endforeach
                   @endif
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
