@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/frontend/publish/estilos.css">
  <body>
    <style>
        .body-overlay{
    background-image: url('/images/business.jpg');
        }
    </style>
    <div class="body-overlay">
        
    </div>
    <section id="team">
        <div class="container  py-5 text-center">
                <div class="row mb-5">
                    <div class="col">
                        <h1>Opciones para publicar</h1>
                        <div class="mt-3"> 
                            Elegí una opción para poder encontrar los planes que mas te sirvan
                        </div>
                       
                    </div>

                </div>
                <div class="row">
                @if(!empty($aPlans))
                @foreach($aPlans as $planes)
                    <!-- card1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                       
                            <div class="card-body" >
                                <img src="/images/index/userej2.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <div class="plan-header">
                                <h3><b> {{ $planes->num_add }} AVISO</b></h3>
                                <h3> ${{ $planes->price }}</h3>
                            </div>
                                <ul class="ad-list">
                                    <li> <h5 class="ad-bullet"> {{ $planes->time }}</h5></li>
                                    <li><h5 class="ad-bullet">{{ $planes->description1 }}</h5></li>
                                    <li><h5 class="ad-bullet">{{ $planes->description2 }}</h5></li>
                                    <li><h5 class="ad-bullet">{{ $planes->description3 }}</h5></li>
                                </ul>
                                
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
                             <!-- <button type="button" class="btn btn-outline-warning">Elegir</button> -->
                            
                             @if (empty(Auth::user()->id))
                        <!-- <a href="{{ route('pago',$planes->id) }}"> -->
                        <a class="btn btn-outline-prop" href="{{ route('pago',$planes->id) }}" role="button">Elegir</a>
                        @else
                        <!-- <a href="{{ route('publish_publicationtype',$planes->id) }}"> -->
                        <a class="btn btn-outline-prop" href="{{ route('publish_propertie_plan',$planes->id) }}" role="button">Elegir</a>
                        @endif


                            </div>
                           


                        </div>
                    </div>
                     <!-- card1 -->
                   @endforeach
                   @endif
                </div>
        </div>
    </section>

  </body>
  @include('frontend/layouts.footer')
  @endsection
