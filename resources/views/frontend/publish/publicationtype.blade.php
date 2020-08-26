@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/frontend/publish.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    
  <body>

  <div class="container my-3 py-5 text-center">
                <div class="row mb-5">
                    <div class="col">
                        <h1>Opciones para publicar</h1>
                        <div class="mt-3"> Elegí una opción para publicar</div>
                    </div>

                </div>
                </div>

    <section id="team">
        <div class="container my-3 py-5 text-center">
     
                <div class="row">
                    @if(!empty($aOperationType))
                    @foreach($aOperationType as $optype)
                    <!-- card1 -->
                    <div class="col-lg-3 col-md-6">
                    <a href="{{ route('publish_personal_free',$optype->id) }}">
                        <div class="card">
                       
                            <div class="card-body">
                                @if($optype->id == 1)
                                <img src="images/publish/house.png" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                @else
                                <img src="images/publish/building.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                @endif
                                <h3>{{ $optype->name }}</h3>
                                <h5> Dueño directo</h5>
                             <div class="d-flex flex-row justify-content-center">
                                 <div class="p-4">
                                     <a href="#">
                                     <i class="fas fa-ad"></i>
                                     </a>
                                 </div>
                                 <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                    </a>
                                </div>
                             </div>
                             <!-- <button type="button" href="{{ route('personal') }}" class="btn btn-outline-warning">Elegir</button> -->
                            </div>
                          
                            
                        </div>
                        </a>
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
