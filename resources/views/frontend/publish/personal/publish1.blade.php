@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/frontend/publish1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    
  <body>
    <div container id="container">
        <!-- titulo  -->
    <div class="titulo">
        <h2>¡Es un gusto tenerte con nosotros!</h2>
        </div>
        <!-- subtitulo -->
        <div class="subtitulo">
        <p>Empecemos por lo básico: Agregá el tipo de propiedad y su ubicación.</p> 
        </div>
    <!-- empieza seleccion de lugar -->
<!-- Basic dropdown -->
        @if(!empty($aPropietie_type))
      <p>Qué tipo de propiedad querés publicar?</p>
          <select name="building" id="building" >
          @foreach($aPropietie_type as $optype)
            <option value="{{$optype->id}}">{{$optype->name}}</option>
            @endforeach
           
          </select>
          
        @endif
<!-- Basic dropdown -->

    <!-- fin de lugar de seleccion -->

    </div>
  
<div class="linea-tiempo">
  <div class="momento">
    <h3>1</h3>
    <div class="descripcion">
      Ubicación
    </div>
  </div>
  <div class="momento">
    <h3>2</h3>
    <div class="descripcion">
Multimedia
    </div>
  </div>
  <div class="momento">
    <h3>3</h3>
    <div class="descripcion">
Descripción    
</div>
  </div>
  <div class="momento">
    <h3>4</h3>
    <div class="descripcion">
      Características    
    </div>
  </div>
  <div class="momento">
    <h3>5</h3>
    <div class="descripcion">
      Datos personales  
    </div>
  </div>
  <div class="momento">
    <h3>6</h3>
    <div class="descripcion">
      Tipo de publicación 
    </div>
  </div>
</div>

</body>
  @include('frontend/layouts.footer')
  @endsection
