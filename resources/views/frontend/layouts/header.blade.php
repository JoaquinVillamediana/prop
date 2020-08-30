<!-- header -->
<link rel="stylesheet" href="/css/frontend/header.css">
<nav id="header" class="navbar navbar-expand-lg navbar-light bg-prop">
  <div class="container">
    
   <a class="navbar-brand" href="/"><img src="/images/index/logoprop.png" alt="logo" style="width:160px;"></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link important" href="{{ route('publish') }}">Publicar una propiedad</a>
      </li>
       <li class="nav-item">
         <a class="nav-link " href="{{ route('search_compra') }}">Comprar</a>
       </li>
       <li class="nav-item">
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
  <i class="far fa-smile"></i> {{ Auth::user()->name}}
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="{{ route('user_profile') }}">Perfil</a>
    <a class="dropdown-item" href="{{ route('user_propieties') }}">Mis publicaciones</a>
    <a class="dropdown-item" href="{{ route('messages') }}">Contactados</a>
    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
  </div>
</div>
        
       </li>

       @endif
     </ul>
     </div>  
   </div>
 </nav>
 <!-- end header -->