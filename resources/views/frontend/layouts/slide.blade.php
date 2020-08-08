
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<!-- Our Custom CSS -->
<link rel="stylesheet" href="css/frontend/search.css">

<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" >
            
    
            <ul class="list-unstyled components">
        <!-- inicio de filtros activos -->
            <li>
                <h3> Seleccion actual </h3>
                    <span class="badge badge-light">Capital Federal</span>
                    <span class="badge badge-light">2 dormitorios</span>
                    <span class="badge badge-light">Departamento</span>
                    <span class="badge badge-light">Alquiler</span>
            </li>

        <!--  fin de filtros activos -->
        
        <!-- inicio  Agregar Ubicacion  -->
            <li>
                <div class="input-group mb-3 mt-4">
                    <input type="text" class="form-control" placeholder="Ubicación" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">+</button>
                    </div>
                </div>
            </li>
        <!-- Fin de ubicación  -->

        <!-- Inicio de TIPO DE OPERACION -->
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tipo de operacion </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <div class="form-check">
                        <!--  -->
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                           Comprar
                        </label>
                        </br>
                        <!--  -->
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Alquilar
                        </label>
                        </br>
                        <!--  -->
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Temporal
                        </label>
                        </br>
                        <!--  -->
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Emprendimientos
                        </label>
                        </br>
                        <!--  -->
                     </div>
                </ul>

            </li>
            <!-- Fin de tipo de operacion  -->
            <!-- Inicio de tipo de propiedad -->
            <li class="active">
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tipo de propiedad </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <div class="form-check">
                        <!--  -->
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                           Departamento
                        </label>
                        </br>
                        <!--  -->
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Casa
                        </label>
                        </br>
                        <!--  -->
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Terreno
                        </label>
                        </br>
                        <!--  -->
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Local comercial
                        </label>
                        </br>
                        <!--  -->
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Oficina comercial
                        </label>
                        </br>
                        <!--  -->
                    </div>

                </ul>
            </li>
            <!-- FIn de tipo de propiedad -->
            <!-- Inicio de cantidad de ambientes -->
            <p> Ambientes </p>
                <li>
                    <button type="button" class="btn btn-outline-warning">1+</button>
                    <button type="button" class="btn btn-outline-warning">2+</button>
                    <button type="button" class="btn btn-outline-warning">3+</button>
                    <button type="button" class="btn btn-outline-warning">4+</button>
                    <button type="button" class="btn btn-outline-warning">5+</button>
                </li>
                </br>

                 <!-- FIn de cantidad de ambientes -->
            <!-- Inicio de cantidad de dormitorios -->

                <p> Dormitorios </p>
                <li>
                    
                    <button type="button" class="btn btn-outline-warning">1+</button>
                    <button type="button" class="btn btn-outline-warning">2+</button>
                    <button type="button" class="btn btn-outline-warning">3+</button>
                    <button type="button" class="btn btn-outline-warning">4+</button>
                    <button type="button" class="btn btn-outline-warning">5+</button>

                </li>
                <!-- FIn de cantidad de Dormitorios -->
                <!-- Inicio de precios -->

                <li class="active">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Precio </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                      <div class="form-check">
                        <!--  -->
                        <form>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="$Desde">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="$Hasta">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">+</button>
                            </div>
                        </div>
                    </form>
                    </div>

                     </ul>
                </li>
<!--  -->
                <li class="active">
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Expensas </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                      <div class="form-check">
                      <form>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="$Desde">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="$Hasta">
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">+</button>
                            </div>
                        </div>
                    </form>
                        <!--  -->
                    </div>

                     </ul>
                </li>
<!--  -->
                

            </ul>
    
        </nav>
        <!-- Page Content -->
      <!-- end -->
    </div>

     