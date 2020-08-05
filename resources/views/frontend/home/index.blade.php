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
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('publish') }}">Publicar una propiedad</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-platzi" href="{{ route('login') }}">Ingresar</a>
      </li>
    </ul>
    </div>  
  </div>
</nav>
<!-- end header -->
<!-- main -->
<section id="main">
    <div id="carousel" class="carousel slide" data-ride="carousel" data-pause="false">
        <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol> -->
         <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/index/slider1.jpg" class="d-block w-100" alt=" img 1">
            </div>
            <div class="carousel-item">
                <img src="images/index/slider2.jpg" class="d-block w-100" alt=" img 2">
            </div>
            <div class="carousel-item">
                <img src="images/index/slider3.jpg" class="d-block w-100" alt=" img 3 ">
            </div>
            <div class="overlay">
                <div class="container">
                     <div class="row">
                         <div class="overlay">

                         <h1>Bienvenido a CuloProp</h1>
<p> Publica tu propiedad en 5 minutos y consigue que nuestros mas de  500.000 usuarios la vean.
</p>                


                          </div>   

                       


                    </div>
                    <div class="row">
                    <div class="col-md-6 offset-md-3">
                    <div id="searchinput" class="input-group mb-3"> 
              <div class="input-group-prepend"> 
                <button type="button" class="btn btn-outline-secondary">Search</button> 
                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                  <span class="sr-only">Toggle Dropdown</span> 
                </button> <div class="dropdown-menu"> 
                  <a class="dropdown-item" href="#">Ciudad 1</a> 
                  <a class="dropdown-item" href="#">Ciudad 2</a> 
                  <a class="dropdown-item" href="#">Ciudad 3</a> 
                </div> 
                <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
            </div>
          </div>
          </div>
          </div>

                </div>
                
            </div>
           

    </div>
</section>
<!-- endmain -->
<!-- props -->
<section id ="props" class="mt-4">

<div class="container">
<div class="row">
<div class="col text-center text-uppercase">
  <small> Conocé nuestras</small>
  <h2> Propiedades destacadas</h2>

  

</div>  
  

  

</div>
<div class="row">
<div class="col-md-4 mb-4">
<div class="card" >
  <img src="images/index/home1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
  <div class="badge mb-2">
  <span class="badge badge-warning"> 4 dormintorios </span>  
  <span class="badge badge-info"> 3 baños </span>  
  </div>
    <h5 class="card-title mb-0">Prop 1</h5>
   
    <p class="card-text">4 baños y un par de boludeces.</p>
    <a href="#" class="btn btn-primary">Más información</a>
  </div>
</div>

</div>  
<div class="col-md-4 mb-4">
<div class="card" >
  <img src="images/index/home2.jpg" class="card-img-top" alt="...">
  <div class="card-body">
  <div class="badge mb-2">
  <span class="badge badge-warning"> 4 dormintorios </span>  
  <span class="badge badge-info"> 3 baños </span>  
  </div>
    <h5 class="card-title mb-0">Prop 2</h5>
   
    <p class="card-text ">4 baños y un par de boludeces.</p>
    <a href="#" class="btn btn-primary">Más información</a>
  </div>
</div>

</div> 
<div class="col-md-4 mb-4">
<div class="card" >
  <img src="images/index/home3.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    

  <div class="badge mb-2">
  <span class="badge badge-warning"> 4 dormintorios </span>  
  <span class="badge badge-info"> 3 baños </span>  
  </div>
    <h5 class="card-title mb-0">Prop 3</h5>
  
    <p class="card-text">4 baños y un par de boludeces.</p>
    <a href="#" class="btn btn-primary">Más información</a>
  </div>
</div>

</div> 
</div>  


</div>
</section>

<!-- endprops -->

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