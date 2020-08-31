@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')


<!-- <link rel="stylesheet" href="/css/frontend/contact.css"> -->
<div class="container">





<div class="row pt-5 mb-5 justify-content-center text-right">

<div class="col ">
  <h2 style="font-size: 25px;color:#000;" class="font-weight-bold text-center">Publicidad</h2>

</div>

</div>

<div style="margin-top: 10px;" id="section-faqs" class="container ">
<div class="row">
  

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(1)" href="">. ¿Cómo publicitar mi propiedad?<span id="sign-1" class="float-right">+</span></a> </h2>
    <p id="1" style="display: none;">Para promocionar tu propiedad se requiere contratar algúno de los planes disponibles en la seccion de <a href="{{ route('publish') }}">planes</a>. </br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs.</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(2)" href="">. ¿Cómo puede aparecer mi propiedad entre las DESTACADAS?<span id="sign-2" class="float-right"><b>+</b></span></a> </h2>
    <p id="2" style="display: none;">Para que una propiedad aparezca entre las destacadas debe haber sido publicada mediante la contratación del plan <a href="{{ route('publish') }}">PLATINUM</a>. Automáticamente la propiedad se encontrará entre las destacadas. </br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs.</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(3)" href="">. ¿De qué me sirve publicitar mis propiedades?<span id="sign-3" class="float-right"><b>+</b></span></a> </h2>
    <p id="3" style="display: none;">Al publicitar las propiedades en <a href="{{ route('home') }}">tuproximaprop.com</a> se genera una excelente visibilidad de la misma, totalmente medible, la cual permite un incremento en el número de interesados en la misma. Desde tu panel de control podras revisar las 24 hs. variables duras(entre las que se encuentra la cantidad de usuarios individuales que vieron el anuncio, la cantidad de ellos que entraron a conocer más sobre la publicación o el tiempo que pasaron en ella). </br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs.</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(4)" href="">. ¿Cómo elegir los PLANES para publicitar?<span id="sign-4" class="float-right"><b>+</b></span></a> </h2>
    <p id="4" style="display: none;">Para publicar una propiedad existen diversos planes que se ajustan a todas las necesidades. La diferencia entre cada uno de los planes radica en la visibilidad y el volumen que se requiera para la publicación. Tambíen en función del aumento periodo de contrato se reduce significantemente el precio respectivamente en cada plan. </br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs.</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(5)" href="">. ¿Se pueden hacer planes PERSONALIZADOS?<span id="sign-5" class="float-right"><b>+</b></span></a> </h2>
    <p id="5" style="display: none;">Sí. Existe la posibilidad de generar planes a medida del aunciante. Para esto deberán <a href="{{ route('contact') }}">contactarse</a> para acordar una opción que se acomode a las necesidades. </br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs. </p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(6)" href="">. ¿Cómo hacer que mi propiedad se publique en las REDES SOCIALES de tuproximaprop.com?<span id="sign-6" class="float-right"><b>+</b></span></a> </h2>
    <p id="6" style="display: none;"> Al contratar el plan <a href="{{ route('publish') }}">PLATINUM</a> se le permite al usuario, en el caso de ser profesional, cual de las publicaciones desea que aparezca en nuestras redes sociales. En el caso de ser un usuario individual se le ofrecería lo mismo pero para la publicación contratada.</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(7)" href="">. ¿Hay un MÁXIMO de publicaciones para publicitar?<span id="sign-7" class="float-right"><b>+</b></span></a> </h2>
    <p id="7" style="display: none;">No, no existe ningún máximo para las publicaciones. Si el número de propiedades a publicar supera apliamente la capacidad de los planes y desea generar un plan personalizado es necesario <a href="{{ route('contact') }}">contactarse</a>. </br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs.</p>
  </div>


</div>
</div>

</div>

</br>





<style>
body{
  box-sizing: border-box;
  transition: all ease .5s;
}

.faqs-head{
  font-size: 20px;
       
  font-weight: 800;
}

.faq:hover a{
  color: #f0ae1d !important;
}

.faq a{
  cursor: pointer;
  text-decoration: none;
  color: #000000;
}

.faq p{
  padding-top: 10px;
  padding-bottom: 10px;
  font-size: 18px;
  
  color: #000000;
}

.faq p span{
  font-size: 35px !important;
}

.faq{
  margin-top: 20px;
}

#section-faqs{
  margin-bottom: 200px;
}


</style>




<script>
  $( document ).ready(function() {
  $('#headFav').fadeIn(400);
});
</script>

<script>
  function displayText(faq)
        {
          event.preventDefault();
          if($('#'+faq).css("display") == 'none')
          {
            $('#'+faq).slideDown();
            $('#sign-'+faq).text('-');
          }
          else{
            $('#'+faq).slideToggle();
            $('#sign-'+faq).text('+');
          }
          
        }
      </script>


@include('frontend/layouts.footer')


@endsection