<div class="wrapper">
  <!-- Sidebar -->
  <nav id="sidebar">


    <ul class="list-unstyled components">
      <!-- inicio de filtros activos -->
      <li>
        <div class="actual-selection">
        <h3> Seleccion actual </h3><span class="filters-delete" onclick="deleteFilters()"><i class="fas fa-trash-alt"></i></span>
      </div>
        <div class="selected-tags">

        </div>
        
      </li>

      <!--  fin de filtros activos -->

      <!-- inicio  Agregar Ubicacion  -->
      <li>
        <div class="input-group mb-3 mt-4 search-location">
            <input placeholder="Ubicacion:" type="text" name="text" id="location" autocomplete="off">
              <input type="hidden" name="locality" value="" id="locality">
              <div class="options">

              </div>
        </div>
      </li>
      <!-- Fin de ubicación  -->

      <!-- Inicio de TIPO DE OPERACION -->
      <li class="active">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle sidebar-subtitle">Tipo de
          operacion </a>
        <ul class="collapse list-unstyled" id="homeSubmenu">

          <div class="form-check">

            @if(!empty($aOperationType))


            @foreach($aOperationType as $optype)

            <!--  -->
            <div class="radio-option">
            <input class="form-check-input" type="radio" name="optype" id="optype{{$optype->id}}" {{ $optype->id == 2 ? 'checked' : '' }}
              value="{{$optype->id}}">
            <label class="form-check-label" for="optype{{$optype->id}}">
              {{$optype->name}}
            </label>
          </div>
            <!--  -->


            @endforeach



            @endif


          </div>
        </ul>

      </li>
      <!-- Fin de tipo de operacion  -->
      <!-- Inicio de tipo de propiedad -->
      <li class="active">
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle sidebar-subtitle">Tipo de
          propiedad </a>
        <ul class="collapse list-unstyled" id="pageSubmenu">
          <div class="form-check">


            @if(!empty($aPropietie_type))


            @foreach($aPropietie_type as $prop_type)

            <!--  -->
            <div class="radio-option">
            <input class="form-check-input" type="radio" name="prop_type"
              id="prop_type{{$prop_type->id}}" value="{{$prop_type->id}}" {{ $prop_type->id == 2 ? 'checked' : '' }}>
            <label class="form-check-label" for="prop_type{{$prop_type->id}}">
              {{$prop_type->name}}
            </label>
          </div>

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
        <button type="button" id="cantidad_ambientes_1" data-rooms="1" class="rooms btn btn-prop">1+</button>
        <button type="button" id="cantidad_ambientes_2" data-rooms="2" class="rooms btn btn-prop">2+</button>
        <button type="button" id="cantidad_ambientes_3" data-rooms="3" class="rooms btn btn-prop">3+</button>
        <button type="button" id="cantidad_ambientes_4" data-rooms="4" class="rooms btn btn-prop">4+</button>
        <button type="button" id="cantidad_ambientes_5" data-rooms="5" class="rooms btn btn-prop">5+</button>
      </li>
      

      <!-- FIn de cantidad de ambientes -->
      <!-- Inicio de cantidad de dormitorios -->

      <p class="sidebar-subtitle"> Dormitorios </p>
      <li>

        <button type="button" data-bedrooms="1" class="bedrooms btn btn-prop">1+</button>
        <button type="button" data-bedrooms="2" class="bedrooms btn btn-prop">2+</button>
        <button type="button" data-bedrooms="3" class="bedrooms btn btn-prop">3+</button>
        <button type="button" data-bedrooms="4" class="bedrooms btn btn-prop">4+</button>
        <button type="button" data-bedrooms="5" class="bedrooms btn btn-prop">5+</button>

      </li>
      <!-- FIn de cantidad de Dormitorios -->
      <!-- Inicio de precios -->

      <li class="active">
        <p class="sidebar-subtitle">Precio</p>
        <label for="">Moneda</label>
        <select name="currency" id="currency" class="currency_select">
          @foreach ($aCurrencies as $currency)
              <option id="currency-{{$currency->id}}" {{ empty($oSearch->currency) &&   $currency->id == 2 ? 'selected' : '' }} {{ !empty($oSearch->currency) && $oSearch->currency == $currency->id ? 'selected' : '' }} value="{{$currency->id}}">{{$currency->name}}</option>
          @endforeach
        </select>
        <p class="sidebar-indicator">Desde: <span class="currency-symbol mr-1">$</span><span id="price-min">0</span></p>
        <div class="slidecontainer">
          <input step="1000" type="range" min="0" max="1000000" value="0" class="slider" id="slider-price-min">
        </div>
        <p class="sidebar-indicator">Hasta: <span class="currency-symbol mr-1">$</span><span id="price-max">{{ number_format(3000000, 0, ',', '.')  }}</span></p>
        <div class="slidecontainer">
          <input step="1000" type="range" min="0" max="3000000" value="3000000" class="slider" id="slider-price-max">
        </div>
      </li>
      <!--  -->
      <li class="active">
          <p class="sidebar-subtitle">Expensas</p>
          <p class="sidebar-indicator">Desde: $<span id="expenses-min">0</span></p>
          <div class="slidecontainer">
            <input step="100" type="range" min="0" max="100000" value="0" class="slider" id="slider-expenses-min">
          </div>
          <p class="sidebar-indicator">Hasta: $<span id="expenses-max">{{number_format(100000, 0, ',', '.')  }}</span></p>
          <div class="slidecontainer">
            <input step="100" type="range" min="0" max="100000" value="100000" class="slider" id="slider-expenses-max">
          </div>
        </li>

        <div class="search-button">
            <button class="btn btn-search">Buscar</button>
        </div>
      <!--  -->


    </ul>

  </nav>
  <script>
   
  </script>
  <!-- Page Content -->
  <!-- end -->
</div>