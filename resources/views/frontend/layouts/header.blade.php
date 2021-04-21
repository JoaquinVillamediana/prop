<?php 

$full_url = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$path_info =  parse_url($full_url,PHP_URL_PATH);

?>
<!-- header -->
<link rel="stylesheet" href="/css/frontend/header.css">
<nav id="header" class="navbar navbar-expand-lg navbar-light bg-prop">
  <div class="container">
    
   <a class="navbar-brand" href="/"><img src="/images/index/logopropiedades.png" alt="TuProximaProp LOGO" style="width:160px;"></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav ml-auto">
      <li class="nav-item @if(strpos($path_info, 'publish')) active @endif">
        <a class="nav-link important" href="{{ route('publish_propertie_plan') }}">Publicar una propiedad</a>
      </li>
       <li class="nav-item @if(strpos($path_info, 'search/compra')) active @endif">
         <a class="nav-link " href="{{ route('search_compra') }}">Comprar</a>
       </li>
       <li class="nav-item @if(strpos($path_info, 'search/alquiler')) active @endif">
        <a class="nav-link " href="{{ route('search_alquiler') }}">Alquilar</a>
      </li>
      
       @if (empty(Auth::user()->id))
       <li class="nav-item">
         <a class="nav-link text-platzi" href="{{ route('login') }}">Ingresar</a>
       </li>
       @else
       <li class="nav-item">
       <div class="dropdown">
  <a class="nav-link text-platzi" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="far fa-user"></i> {{ Auth::user()->name}}
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="{{ route('user_profile') }}"> <i class="fas fa-clipboard-list"></i> Perfil</a>
    <a class="dropdown-item" href="{{ route('configuration.index') }}"> <i class="fas fa-cog"></i> Configuración</a> 
    <a class="dropdown-item" href="{{ route('mis_propiedades.index') }}"> <i class="fas fa-chart-bar"></i> Estadísticas</a>
    <a class="dropdown-item" href="{{ route('logout') }}"> <i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
</div>
        
       </li>

       @endif
     </ul>
     </div>  
   </div>
 </nav>
 <!-- end header -->