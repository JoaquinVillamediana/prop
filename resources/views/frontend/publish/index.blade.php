@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/frontend/publish.css">

<body>
    <section class="section-election">
        <div class="row row-section">
            <div class="col-12 col-legend">
                <h1>Opciones para publicar</h1>
                {{-- <div class="mt-3"> Elegí una opción para poder encontrar los planes que mas te sirvan</div> --}}
            </div>
            <div class="col-12 col-option">
                <div class="option">
                    <div class="row">
                        <div class="col-md-4 col-4  pr-0">
                            <img class="type-image-particular" src="/images/particular.jpg" alt="">
                        </div>
                        <div class="col-md-7 col-6 col-text">
                            <h5 class="link-name">Particular</h5>
                            <p class="link-description"><i class="fas fa-home mr-2"></i>Dueño directo</p>
                            <p class="link-description"><i class="fas fa-mail-bulk"></i>Podes mirar los mensajes de los interesados.</p>
                            <p class="link-description"><i class="fas fa-angle-double-up"></i>Posiciona tu publicacion con nuestros planes.</p>
                        </div>
                        <div class="col-md-1 col-2 icon-particular">
                            <a href="{{ route('personal') }}" class="btn btn-particular" href=""><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 col-option">
                <div class="option">
                    <div class="row">
                        <div class="col-md-1 col-2 icon-business">
                            <a href="{{ route('profesional') }}" class="btn btn-business" href=""><i class="fas fa-chevron-left"></i></a>
                        </div>
                        
                        <div class="col-md-7 col-6 col-text">
                            <h5 class="link-name">Profesional</h5>
                            <p class="link-description"><i class="fas fa-user-tie mr-2"></i> Inmobiliaria, corredor o constructora</p>
                            <p class="link-description"><i class="fas fa-mail-bulk"></i>Podes mirar los mensajes de los interesados.</p>
                            <p class="link-description"><i class="fas fa-angle-double-up"></i>Posiciona tu publicacion con nuestros planes.</p>
                        </div>
                        <div class="col-md-4 col-4 pl-0">
                            <img class="type-image-business" src="/images/business.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="container my-3 py-5 text-center">
        <div class="row mb-5">
            <div class="col">
                <h1>Opciones para publicar</h1>
                <div class="mt-3"> Elegí una opción para poder encontrar los planes que mas te sirvan</div>
            </div>

        </div>
    </div>

    <section id="team">
        <div class="container my-3 py-5 text-center">

            <div class="row">
                <!-- card1 -->
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('personal') }}">
                        <div class="card">

                            <div class="card-body">
                                <img src="images/index/userej.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>Particular</h3>
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
                <!-- card2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <a href="{{ route('profesional') }}">
                            <div class="card-body">
                                <img src="images/index/userej2.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>Profesional</h3>
                                <h5> Inmobiliaria, corredor o constructora</h5>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-4">
                                        <a href="#">
                                            <i class="fas fa-ad"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="#">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="#">
                                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- <button type="button" href="{{ route('profesional') }}" class="btn btn-outline-warning">Elegir</button> -->
                            </div>
                        </a>
                    </div>
                </div>
                <!-- card2 -->

            </div>
        </div>
    </section> --}}


</body>
@include('frontend/layouts.footer')
@endsection