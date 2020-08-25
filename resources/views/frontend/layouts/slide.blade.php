<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">


      <ul class="list-unstyled components">
        <!-- inicio de filtros activos -->
        <li>
          <h3> Seleccion actual </h3>
          @if(!empty($aPropietie_type_name))
          <span class="badge badge-light">Departamento</span>
          @endif
          @if(!empty($aOperationType_name))
          <span class="badge badge-light">venta</span>
          @endif
          <span class="badge badge-light">Capital Federal</span>
          <span class="badge badge-light">2 dormitorios</span>
          <span class="badge badge-light">Alquiler</span>
        </li>

        <!--  fin de filtros activos -->

        <!-- inicio  Agregar Ubicacion  -->
        <li>
          <div class="input-group mb-3 mt-4">
            <input type="text" class="form-control" placeholder="Ubicación" aria-label="Recipient's username"
              aria-describedby="button-addon2">
          </div>
        </li>
        <!-- Fin de ubicación  -->

        <!-- Inicio de TIPO DE OPERACION -->
        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tipo de
            operacion </a>
          <ul class="collapse list-unstyled" id="homeSubmenu">

            <div class="form-check">

              @if(!empty($aOperationType))


              @foreach($aOperationType as $optype)

              <!--  -->
              <input class="form-check-input" type="radio" name="optype{{$optype->id}}" id="optype{{$optype->id}}"
                value="optype{{$optype->id}}" checked>
              <label class="form-check-label" for="optype{{$optype->id}}">
                {{$optype->name}}
              </label>
              </br>
              <!--  -->


              @endforeach



              @endif


            </div>
          </ul>

        </li>
        <!-- Fin de tipo de operacion  -->
        <!-- Inicio de tipo de propiedad -->
        <li class="active">
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tipo de
            propiedad </a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <div class="form-check">


              @if(!empty($aPropietie_type))


              @foreach($aPropietie_type as $prop_type)

              <!--  -->
              <input class="form-check-input" type="radio" name="prop_type{{$prop_type->id}}"
                id="prop_type{{$prop_type->id}}" value="prop_type{{$prop_type->id}}" checked>
              <label class="form-check-label" for="prop_type{{$prop_type->id}}">
                {{$prop_type->name}}
              </label>
              </br>
              <!--  -->


              @endforeach



              @endif


            </div>

          </ul>
        </li>
        <!-- FIn de tipo de propiedad -->
        <!-- Inicio de cantidad de ambientes -->
        <p class="sidebar-subtitle"> Ambientes </p>
        <li>
          <button type="button" id="cantidad_ambientes_1" class="btn btn-prop">1+</button>
          <button type="button" id="cantidad_ambientes_2" class="btn btn-prop">2+</button>
          <button type="button" id="cantidad_ambientes_3" class="btn btn-prop">3+</button>
          <button type="button" id="cantidad_ambientes_4" class="btn btn-prop">4+</button>
          <button type="button" id="cantidad_ambientes_5" class="btn btn-prop">5+</button>
        </li>
        </br>

        <!-- FIn de cantidad de ambientes -->
        <!-- Inicio de cantidad de dormitorios -->

        <p class="sidebar-subtitle"> Dormitorios </p>
        <li>

          <button type="button" class="btn btn-prop">1+</button>
          <button type="button" class="btn btn-prop">2+</button>
          <button type="button" class="btn btn-prop">3+</button>
          <button type="button" class="btn btn-prop">4+</button>
          <button type="button" class="btn btn-prop">5+</button>

        </li>
        <!-- FIn de cantidad de Dormitorios -->
        <!-- Inicio de precios -->

        <li class="active">
          <p class="sidebar-subtitle">Precio</p>
          <p class="sidebar-indicator">Desde: $<span id="price-min">0</span></p>
          <div class="slidecontainer">
            <input type="range" min="0" max="10000000" value="0" class="slider" id="slider-price-min">
          </div>
          <p class="sidebar-indicator">Hasta: $<span id="price-max">10000000</span></p>
          <div class="slidecontainer">
            <input type="range" min="0" max="10000000" value="10000000" class="slider" id="slider-price-max">
          </div>
        </li>
        <!--  -->
        <li class="active">
            <p class="sidebar-subtitle">Expensas</p>
            <p class="sidebar-indicator">Desde: $<span id="expenses-min">0</span></p>
            <div class="slidecontainer">
              <input type="range" min="0" max="10000000" value="0" class="slider" id="slider-expenses-min">
            </div>
            <p class="sidebar-indicator">Hasta: $<span id="expenses-max">10000000</span></p>
            <div class="slidecontainer">
              <input type="range" min="0" max="10000000" value="10000000" class="slider" id="slider-expenses-max">
            </div>
          </li>

          <div class="search-button">
              <button class="btn btn-search">Buscar</button>
          </div>
        <!--  -->


      </ul>

    </nav>
    <script>
      var slider_price_min = document.getElementById("slider-price-min");
        var price_min = document.getElementById("price-min");
        var slider_price_max = document.getElementById("slider-price-max");
        var price_max = document.getElementById("price-max");
        slider_price_max.oninput = function() {
            price_max.innerHTML = this.value;
        }
        slider_price_min.oninput = function() {
            price_min.innerHTML = this.value;
        }



        var slider_expenses_min = document.getElementById("slider-expenses-min");
        var expenses_min = document.getElementById("expenses-min");
        var slider_expenses_max = document.getElementById("slider-expenses-max");
        var expenses_max = document.getElementById("expenses-max");
        slider_expenses_max.oninput = function() {
            expenses_max.innerHTML = this.value;
        }
        slider_expenses_min.oninput = function() {
            expenses_min.innerHTML = this.value;
        }
    </script>
    <!-- Page Content -->
    <!-- end -->
  </div>