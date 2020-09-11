@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/frontend/publish.css">

<body>
    <div class="body-overlay">

    </div>
    <div class="container section-election">
        <h1 class="section-name">Opciones para publicar</h1>
        <div class="options-container">
        <div class="row row-option particular">
            <div class="col-md-3 col-12  col-image">
                <img class="type-image-particular img-fluid" src="/images/particular.jpg" alt="">
            </div>
            <div class="col-md-7 col-12 col-text">
                <div class="container">
                    <h5 class="link-name">Particular</h5>
                <p class="link-description"><i class="fas fa-home mr-2"></i>Dueño directo</p>
                <p class="link-description"><i class="fas fa-mail-bulk mr-2"></i>Podes mirar los mensajes de los interesados.</p>
                <p class="link-description"><i class="fas fa-angle-double-up mr-2"></i>Posiciona tu publicacion con nuestros planes.</p>
                </div>
                
            </div>
            <div class="col-md-2 col-12 col-arrow">
                <div class="arrow-container">
                    <a href="{{ route('personal') }}" class="btn btn-particular" href=""><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row row-option business mt-4">
            
            <div class="col-md-2 col-12 col-arrow">
                <div class="arrow-container">
                    <a href="{{ route('profesional') }}" class="btn btn-particular" href=""><i class="fas fa-chevron-left"></i></a>
                </div>
            </div>
            <div class="col-md-7 col-12 col-text">
                <div class="container">
                    <h5 class="link-name">Profesional</h5>
                            <p class="link-description"><i class="fas fa-user-tie mr-2"></i> Inmobiliaria, corredor o constructora</p>
                            <p class="link-description"><i class="fas fa-mail-bulk mr-2"></i>Podes mirar los mensajes de los interesados.</p>
                            <p class="link-description"><i class="fas fa-angle-double-up mr-2"></i>Posiciona tu publicacion con nuestros planes.</p>
                </div>
                
            </div>
            <div class="col-md-3 col-12  col-image">
                <img class="type-image-particular img-fluid" src="/images/business.jpg" alt="">
            </div>
        </div>
    </div>
    </div>


















   {{-- <div class="col-12 col-option">
                
                    <div class="row">
                        <div class="col-md-4 col-0  pr-0">
                            <img class="type-image-particular" src="/images/particular.jpg" alt="">
                        </div>
                        <div class="col-md-7 col-9 col-text">
                            <h5 class="link-name">Particular</h5>
                            <p class="link-description"><i class="fas fa-home mr-2"></i>Dueño directo</p>
                            <p class="link-description"><i class="fas fa-mail-bulk"></i>Podes mirar los mensajes de los interesados.</p>
                            <p class="link-description"><i class="fas fa-angle-double-up"></i>Posiciona tu publicacion con nuestros planes.</p>
                        </div>
                        <div class="col-md-1 col-3 icon-particular">
                            <a href="{{ route('personal') }}" class="btn btn-particular" href=""><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                
            </div>
            <div class="col-12 mt-3 col-option">
                
                    <div class="row">
                        <div class="col-md-1 col-3 icon-business">
                            <a href="{{ route('profesional') }}" class="btn btn-business" href=""><i class="fas fa-chevron-left"></i></a>
                        </div>
                        
                        <div class="col-md-7 col-9 col-text">
                            <h5 class="link-name">Profesional</h5>
                            <p class="link-description"><i class="fas fa-user-tie mr-2"></i> Inmobiliaria, corredor o constructora</p>
                            <p class="link-description"><i class="fas fa-mail-bulk"></i>Podes mirar los mensajes de los interesados.</p>
                            <p class="link-description"><i class="fas fa-angle-double-up"></i>Posiciona tu publicacion con nuestros planes.</p>
                        </div>
                        <div class="col-md-4 col-0 pl-0">
                            <img class="type-image-business" src="/images/business.jpg" alt="">
                        </div>
                    </div>
                
            </div> --}}
</body>
@include('frontend/layouts.footer')
@endsection