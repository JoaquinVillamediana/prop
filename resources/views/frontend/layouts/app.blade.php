<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/frontend/home/estilos.css">
    <title>Propiedades</title>
  </head>
  <body>
<!-- header -->
<nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container">
  <a class="navbar-brand" href="/">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('publish') }}">Publicar una propiedad</a>
      </li>
      @if (empty(Auth::user()->id))
      <li class="nav-item">
        <a class="nav-link text-platzi" href="{{ route('login') }}">Ingresar</a>
      </li>
      @endif
    </ul>
    </div>  
  </div>
</nav>
<!-- end header -->
<!-- main -->



<div class="nav-margin">
            <div class="container" id="main-container" style="padding-top:55px !important">
            @yield('content')
            </div>
        </div>


<!-- endmain -->

<!-- footer -->

<footer id="footer" class="pb-4 pt-4">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-lg">
                <a href="#"> Preguntas frecuentes </a>
            </div>
            <div class="col-12 col-lg">
                <a href="#"> Contactanos </a>
            </div>
            <div class="col-12 col-lg">
                <a href="#"> Prensa </a>
            </div>
            <div class="col-12 col-lg">
                <a href="#"> Terminos y condiciones </a>
            </div>
            <div class="col-12 col-lg">
                <a href="#"> XD </a>
            </div>
        </div>
    </div>
</footer>

<!-- endfooter -->

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>









      
