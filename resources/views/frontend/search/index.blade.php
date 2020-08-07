@extends('frontend/layouts.app')

@include('frontend/layouts.header')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/frontend/search.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

@section('content')


   

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" >
            <div class="sidebar-header">
                <h3>Propiedades</h3>
            </div>
    
            <ul class="list-unstyled components">

            
            <li>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Ubicación" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">+</button>
                </div>
            </div>
            </li>    

                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tipo de operacion </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Comprar</a>
                        </li>
                        <li>
                            <a href="#">Alquilar</a>
                        </li>
                        <li>
                            <a href="#">Temporal</a>
                        </li>
                        <li>
                            <a href="#">Emprendimientos</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tipo de propiedad </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Departamento</a>
                        </li>
                        <li>
                            <a href="#">Casa</a>
                        </li>
                        <li>
                            <a href="#">Terreno</a>
                        </li>
                        <li>
                            <a href="#">Local comercial</a>
                        </li>
                        <li>
                            <a href="#">Oficina comercial</a>
                        </li>
                    </ul>
                </li>
                <p> Ambientes </p>
                <li>
                <button type="button" class="btn btn-outline-warning">1+</button>
                <button type="button" class="btn btn-outline-warning">2+</button>
                <button type="button" class="btn btn-outline-warning">3+</button>
                <button type="button" class="btn btn-outline-warning">4+</button>
                <button type="button" class="btn btn-outline-warning">5+</button>
                </li>
                </br>
                <p> Dormitorios </p>
                <li>
                <button type="button" class="btn btn-outline-warning">1+</button>
                <button type="button" class="btn btn-outline-warning">2+</button>
                <button type="button" class="btn btn-outline-warning">3+</button>
                <button type="button" class="btn btn-outline-warning">4+</button>
                <button type="button" class="btn btn-outline-warning">5+</button>
                </li>

                <li>
                    <a href="#">Opcion 4</a>
                </li>
            </ul>
    
        </nav>
        <!-- Page Content -->
      <!-- end -->
    </div>

@include('frontend/layouts.footer')


@endsection