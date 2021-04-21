@extends('frontend/layouts.app')
@include('frontend/layouts.header')

<!-- usuarios normales -->
<link rel="stylesheet" href="{{ asset('/css/frontend/profile/profile.css') }}">
<link rel="stylesheet" href="/css/frontend/profile/properties.css">

@section('content')

@if(!empty($aUser))
@foreach($aUser as $oUserDates)
<section class="section-user-profile">
    @if($oUserDates->user_type == 1)
    <!-- User profile picture -->
    <div class="user-profile-header">
        <div class="profile-slide">
            <img class="profile-slide"src="../images/back/back3.jpg" alt=""> 
            <div class="profile-img-section">
            <img class="img-profile" src="@if(!empty($oUsers->profile_image)) images/profile_pictures_users/{{$oUsers->profile_image}} @else  ../images/logoreducido.png @endif "
                    alt="img-avatar">
            
            </div>
        </div>
    </div>
    <!-- User profile picture -->
    @else
    <!-- User profile picture -->
    <div class="group-profile-header">
        <div class="group-profile-slide">
            <img class="group-profile-slide"src="../images/back/back3.jpg" alt=""> 
            <div class="group-profile-img-section">
            <img class="img-profile" src="@if(!empty($oUsers->profile_image)) images/profile_pictures_users/{{$oUsers->profile_image}} @else  ../images/logoreducido.png @endif "
                    alt="img-avatar">
            

            </div>
        
        </div>
    </div>
    <!-- User profile picture -->
    @endif


    <div class="profile-information">
        <div class="profile-principal-description">
        @if($oUserDates->user_type == 1)
            <h3 class="title">{{$oUserDates->name}} {{$oUserDates->last_name}} <i class="fas fa-check-circle" style="color: #1ec6ff;"></i></h3>
        @else
        <h3 class="title mt-3">{{$oUserDates->social_reason}} <i class="fas fa-check-circle" style="color: #1ec6ff;"></i></h3>

        <!-- <p class="text">Abogado especializado en putas</p> -->

        @endif
        </div>
        <!-- <h2 class="subtitle">Información</h2> -->
        <div class="profile-aditional-description">
            <ul class="information-list">
                <h4>CONTACTO</h4>
                @if(!empty($oUserDates->address))
                <li><i class="information-icon fas fa-map-marker-alt"></i> Ubicación:
                    <span>{{$oUserDates->address}}</span> </li>
                @endif
                @if(!empty($oUserDates->phone))
                <li><i class="information-icon fas fa-mobile"></i> Teléfono: <span>{{$oUserDates->phone}}</span> </li>
                @endif
                @if(!empty($oUserDates->email))
                <li><i class="information-icon far fa-envelope"></i> E-Mail: <span>{{$oUserDates->email}}</span></li>
                @endif
                @if(!empty($oUserDates->website))
                <li><i class="information-icon fas fa-globe"></i> Web: <a
                        href="{{$oUserDates->website}}"><span>{{$oUserDates->website}}</span></a> </li>
                @endif
            </ul>
            <ul class="information-list">
                <h4>INFORMACIÓN</h4>
                @if(!empty($oUserDates->enrollment))
                <li><i class="information-icon far fa-id-card"></i> N° Matrícula:
                    <span>{{$oUserDates->enrollment}}</span> </li>
                @endif
                @if(!empty($oUserDates->origin_date))
                <li><i class="information-icon fas fa-graduation-cap"></i>Año de graduación:
                    <span>{{$oUserDates->origin_date}}</span></li>
                @endif
                @if(!empty($oUserDates->name))
                <li><i class="information-icon fas fa-language"></i> Idiomas: <span>Español - Inglés</span> </li>
                @endif
            </ul>
        </div>
        <div class="social-media">
            @if(!empty($oUserDates->facebook))
            <a href="{{$oUserDates->facebook}}" class="social-button default-social-button fab fa-facebook-f"><i
                    class="icon-default-social-button"></i></a>
            @endif
            @if(!empty($oUserDates->twitter))
            <a href="{{$oUserDates->twitter}}" class="social-button default-social-button fab fa-twitter"><i
                    class="icon-default-social-button"></i></a>
            @endif
            @if(!empty($oUserDates->instagram))
            <a href="{{$oUserDates->instagram}}" class="social-button default-social-button fab fa-instagram"><i
                    class="icon-default-social-button"></i></a>
            @endif
            @if(!empty($oUserDates->linkedin))
            <a href="{{$oUserDates->linkedin}}" class="social-button default-social-button fab fa-linkedin"><i
                    class="icon-default-social-button"></i></a>
            @endif
            @if(!empty($oUserDates->linkedin_user))
            <a href="{{$oUserDates->linkedin}}"
                class="social-button default-social-button fab fa-google-plus-square"><i
                    class="icon-default-social-button"></i></a>
            @endif
        </div>
        
        @if(!empty($oUserDates->description))
            <div class="section-desc">
                <div class="desc">
                    <h2>DESCRIPCIÓN</h2>
                    <p>{{$oUserDates->description}}</p>
                </div>
            </div>
        @endif
        @if(!empty($aProperties))
        <h3 style="margin-top: 15px;">PROPIEDADES PUBLICADAS POR EL USUARIO</h3>
            <div class="row mt-2">
                @foreach ($aProperties as $prop)
                    <div class="col-md-4 mb-4 propertie">
                        <div class="card">
                            <div class="image">
                                <img src="/images/publish/{{$prop->image}}" class="card-img-top" alt="No se encontro la imagen">
                                <div class="row row-caracs">
                                <span class="characteristic" data-toggle="tooltip" data-placement="top" title="{{$prop->rooms}} Ambientes">{{$prop->rooms}}<i class="fas fa-home"></i></span>
                                <span class="characteristic" data-toggle="tooltip" data-placement="top" title="{{$prop->bathrooms}} Baños">{{$prop->bathrooms}}<i class="fas fa-toilet"></i></span>
                                <span class="characteristic" data-toggle="tooltip" data-placement="top" title="{{$prop->bedrooms}} Dormitorios">{{$prop->bedrooms}}<i class="fas fa-bed"></i></span>
                            </div>
                        
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-1"> {{$prop->name}}</h5>
                            <h5 class="card-title mb-1"><b>{{$prop->symbol}}</b> {{ number_format($prop->price, 0, ',', '.')  }}</h5>
                            <p class="card-text">{{$prop->introduction}}.</p>
                            <a href="{{ route('propietie',$prop->id) }}" class="btn btn-moreinfo">Más información</a>
                        </div>
                    </div>
                    
                </div>

                

                
                @endforeach
                <div class="pag col-12">
                    {{ $aProperties->links() }}
                </div>

            </div>
    @endif
    </div>     
    
    
</section>

<script>
    $('.post-header').click( function() {
        if($(this).siblings('.post-content').is(":visible"))
        {
            $(this).siblings('.post-content').slideUp();
            $(this).removeClass('active');
        }else{
            $(this).siblings('.post-content').slideDown();
            $(this).addClass('active');
          
        }
      
    });
</script>
@endforeach
@endif
@include('frontend/layouts.footer')
@endsection