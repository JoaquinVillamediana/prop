@extends('frontend/layouts.app')
@include('frontend/layouts.header')

<!-- usuarios normales -->
<link rel="stylesheet" href="{{ asset('/css/frontend/profile/profile.css') }}">

@section('content')
@if(!empty($aUsers))
@foreach($aUsers as $oUsers)
<section class="section-user-profile">
    @if($oUsers->user_type == 1)
    <!-- User profile picture -->
    <div class="user-profile-header">
        <div class="profile-slide">
            <img class="profile-slide" src="images/back/back3.jpg" alt="">
            <div class="profile-img-section">
                <img class="img-profile" src="@if(!empty($oUsers->profile_image)) images/profile_pictures_users/{{$oUsers->profile_image}} @else images/logoreducido.png @endif "
                    alt="img-avatar">
                <button type="button" class="boton-avatar">
                    <a class="m-auto createButton" data-toggle="modal" data-target="#profileimageModal"><i
                            class="far fa-image"></i></a>

                </button>
            </div>
        </div>
    </div>
    <!-- User profile picture -->
    @else
    <!-- User profile picture -->
    <div class="group-profile-header">
        <div class="group-profile-slide">
            <img class="group-profile-slide" src="images/back/back3.jpg" alt="">
            <div class="group-profile-img-section">
                <img class="group-img-profile" src="@if(!empty($oUsers->profile_image)) images/profile_pictures_users/{{$oUsers->profile_image}} @else images/logoreducido.png @endif "
                    alt="img-avatar">

                <button type="button" class="boton-avatar">
                <a class="m-auto createButton" data-toggle="modal" data-target="#profileimageModal"><i class="far fa-image"></i></a>
                </button>

            </div>

        </div>
    </div>
    <!-- User profile picture -->
    @endif

<?php $percent = 95;?>
    <div class="profile-information">
        <div class="profile-principal-description">
            <h3 class="title mt-3">{{ Auth::user()->user_type == 1 ? "$oUsers->name $oUsers->last_name" : '' }} {{ Auth::user()->user_type == 2 ? "$oUsers->social_reason" : '' }} <i class="fas fa-check-circle"
                    style="color: #1ec6ff;"></i></h3>
     
        </div>

        <div class="profile-completed">
            <h4>Tu perfil esta al <span class="@if($percent < 40 )text-danger @elseif($percent < 80 && $percent >= 40)text-warning @elseif($percent >= 80)text-success @endif">{{ $percent }}%</span></h4>
            @if ($percent < 100)
            <p class="info">Completalo para mejorar tu publico!</p>
            @endif
            <meter min="0" max="100" value="{{$percent}}"></meter>  
            @if ($percent < 100)
            <a href="{{ route('configuration.index') }}" class="btn btn-complete">Completar!</a>
            @endif 
            
        </div>

        @if((empty($oUsers->website)) and $oUsers->user_type == 2 )
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Si no tenes tu propio <strong>sitio web</strong>, contactate para desarrollar la tuya.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <!-- <h2 class="subtitle">Información</h2> -->
        <div class="profile-aditional-description">
            <ul class="information-list">
                <h4>CONTACTO</h4>
                @if(!empty($oUsers->address))
                <li><i class="information-icon fas fa-map-marker-alt"></i> Ubicación:
                    <span>{{$oUsers->address}}</span> </li>
                @endif
                @if(!empty($oUsers->phone))
                <li><i class="information-icon fas fa-mobile"></i> Teléfono: <span>{{$oUsers->phone}}</span> </li>
                @endif
                @if(!empty($oUsers->email))
                <li><i class="information-icon far fa-envelope"></i> E-Mail: <span>{{$oUsers->email}}</span></li>
                @endif
                @if(!empty($oUsers->website))
                <li><i class="information-icon fas fa-globe"></i> Web: <a
                        href="{{$oUsers->website}}"><span>{{$oUsers->website}}</span></a> </li>
                @endif
            </ul>
            <ul class="information-list">
                <h4>INFORMACIÓN</h4>
                @if(!empty($oUsers->enrollment))
                <li><i class="information-icon far fa-id-card"></i> N° Matrícula:
                    <span>{{$oUsers->enrollment}}</span> </li>
                @endif
                @if(!empty($oUsers->origin_date))
                <li><i class="information-icon fas fa-graduation-cap"></i>Año de graduación:
                    <span>{{$oUsers->origin_date}}</span></li>
                @endif
                @if(!empty($oUsers->name))
                <li><i class="information-icon fas fa-language"></i> Idiomas: <span>Español - Inglés</span> </li>
                @endif
            </ul>
        </div>
        <div class="social-media">
            @if(!empty($oUsers->facebook))
            <a href="{{$oUsers->facebook}}" class="social-button default-social-button fab fa-facebook-f"><i
                    class="icon-default-social-button"></i></a>
            @endif
            @if(!empty($oUsers->twitter))
            <a href="{{$oUsers->twitter}}" class="social-button default-social-button fab fa-twitter"><i
                    class="icon-default-social-button"></i></a>
            @endif
            @if(!empty($oUsers->instagram))
            <a href="{{$oUsers->instagram}}" class="social-button default-social-button fab fa-instagram"><i
                    class="icon-default-social-button"></i></a>
            @endif
            @if(!empty($oUsers->linkedin))
            <a href="{{$oUsers->linkedin}}" class="social-button default-social-button fab fa-linkedin"><i
                    class="icon-default-social-button"></i></a>
            @endif
            @if(!empty($oUsers->linkedin_user))
            <a href="{{$oUsers->linkedin}}" class="social-button default-social-button fab fa-google-plus-square"><i
                    class="icon-default-social-button"></i></a>
            @endif
        </div>

        @if(!empty($oUsers->description))
        <div class="section-desc">
            <div class="desc">
                <h2>DESCRIPCIÓN</h2>
                <p>{{$oUsers->description}}</p>
            </div>
        </div>
        @endif
        @if(!empty($aOpinions) || !empty($aArticles))
        <div class="section-posts">
  
            @if (count($aArticles) > 0)
            <div class="post">
                <div class="post-header" data-post-type="1"><span>Articulos</span> <i class="fas fa-chevron-down"></i>
                </div>
                @foreach($aArticles as $oPublications)

                <a href="{{ route('publications',$oPublications->id) }}" class="post-content" style="display: none">
                    <p class="name">{{$oPublications->title}}</p>
                    <p class="date">{{$oPublications->created_at}}</p>
                    
                </a>

                @endforeach
            </div>
            @endif

           
            @if (count($aOpinions) > 0)
            <div class="post">
                <div class="post-header" data-post-type="2"><span>Opiniones</span> <i class="fas fa-chevron-down"></i>
                </div>
                @foreach($aOpinions as $oPublications)
             
                <a href="{{ route('publications',$oPublications->id) }}" class="post-content" style="display: none">
                    <p class="name">{{$oPublications->title}}</p>
                    <p class="date">{{$oPublications->created_at}}</p>
                </a>

             
                @endforeach
            </div>
            @endif


        </div>
        @endif
    </div>


</section>
@endforeach
@endif
@include('layouts.modals')
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

@include('frontend/layouts.footer')
@endsection