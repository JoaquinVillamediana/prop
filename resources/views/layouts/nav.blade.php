{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Propiedades</title>

    <!-- Our Custom CSS -->
<link rel="stylesheet" href="style2.css">
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/admin/nav/estilos.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
@include('frontend/layouts.modals')
<body>

<div class="nav-margin">
            <div class="container" id="main-container" style="padding-top:55px !important">
            @yield('content')
            </div>
        </div>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>CuloProp</h3>
            </div>
    
            <ul class="list-unstyled components">
            <a href="/admin">
            <p>{{Auth::user()->name}} {{Auth::user()->last_name}}</p>
</a>
<li class="active">
    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Mis propiedades</a>
    <ul class="collapse list-unstyled" id="homeSubmenu">
        <li>
            <a href="{{ route('user_propieties') }}"> Mis Anuncios</a>
        </li>
        <li>
            <a href="#">Opcion 2</a>
        </li>
        <li>
            <a href="#">Opcion 3</a>
        </li>
    </ul>
</li>
<li>
    <a href="#">Categoría 2</a>
</li>
<li>
    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Opciones</a>
    <ul class="collapse list-unstyled" id="pageSubmenu">
        <li>
            <a href="#">Opcion 1</a>
        </li>
        <li>
            <a href="#">Opcion 2</a>
        </li>
        <li>
            <a href="#">Opcion 3</a>
        </li>
    </ul>
</li>
<li>
    <a href="#">Categorias 3</a>
</li>
<li>
    <a class="ml-2 nav-link" data-toggle="modal" data-target="#exampleModal">Salir</a>
</li>
</ul>

</nav>
<!-- Page Content -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Esconder barra</span>
            </button>
        </div>
    </nav>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });
    
            $('#dismiss, .overlay').on('click', function () {
                // hide sidebar
                $('#sidebar').removeClass('active');
                // hide overlay
                $('.overlay').removeClass('active');
            });
    
            $('#sidebarCollapse').on('click', function () {
                // open sidebar
                $('#sidebar').addClass('active');
                // fade in the overlay
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
</script>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>
<!-- jQuery Custom Scroller CDN -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
</script>
</body>

</html> --}}


<link rel="stylesheet" href="/css/admin/nav.css">

<nav>
    <div class="container">
        <div class="row">
            <div class="col-12 title">
                <h2>Backend<sub>Prop</sub></h2>
            </div>
        </div>
        <div class="row links">
            <div class="col-12">
                <div class="container">
                    <a href="{{ route('users') }}"><i class="fas fa-users"></i> Usuarios</a>
                </div>
                <div class="container">
                    <a href="{{ route('propieties') }}"><i class="fas fa-building"></i> Propiedades</a>
                </div>
                <div class="container">
                    <a href="{{ route('plans') }}"><i class="fas fa-money-check-alt"></i> Planes</a>
                </div>

                <div class="container">
                    <a href="{{ route('propieties_type') }}"><i class="fas fa-cogs"></i> Tipos de propiedades</a>
                </div>

                <div class="container">
                    <a href="{{ route('operation_type') }}"><i class="fas fa-cogs"></i> Tipos de operaciones</a>
                </div>

            </div>
        </div>
    </div>
</nav>


