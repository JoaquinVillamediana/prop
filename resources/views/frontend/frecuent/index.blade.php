@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')


<!-- <link rel="stylesheet" href="/css/frontend/contact.css"> -->
<div class="container">





<div class="row pt-5 mb-5 justify-content-center text-right">

<div class="col ">
  <h2 style="font-size: 25px;color:#000;" class="font-weight-bold text-center">Preguntas Frecuentes</h2>

</div>

</div>

<div style="margin-top: 10px;" id="section-faqs" class="container ">
<div class="row">
  

<div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(1)" href="">. ¿Cómo publicar una propiedad?<span id="sign-1" class="float-right">+</span></a> </h2>
    <p id="1" style="display: none;">Para publicar tu propiedad se requiere contratar algúno de los planes disponibles en la seccion de <a href="{{ route('publish') }}">planes</a>. Allí encontraras todas las opciones para publicarla, tanto para profesional como para propietario. Es necesario haber iniciado sesión para poder acceder a la opcion de compra de cualquier plan. Teniendo en cuenta esto, si el comprador no posee una cuenta deberá registrarse primero.</br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs.</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(2)" href="">. ¿Cómo puedo buscar una propiedad con los filtros que quiero?<span id="sign-2" class="float-right"><b>+</b></span></a> </h2>
    <p id="2" style="display: none;">Para poder buscar una propiedad se necesita ingresar una localidad en el buscador, el tipo de operación que busca y el tipo de propiedad. Si no existen preferencias a la hora de comenzar la busqueda puede oprimir directamente el botón de busqueda avanzada y te mostraremos nuestras propiedades destacadas. </br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs.</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(3)" href="">. ¿Qué opciones de pago existen?<span id="sign-3" class="float-right"><b>+</b></span></a> </h2>
    <p id="3" style="display: none;"> A la hora de pagar el usuario puede elegir entre realizar la transacción por Mercado Pago, Terjeta de Débito o crédito, Efectivo(Pago Fácil, Rapipago y kioscos) o transferencia por Red Link. </br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs.</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(4)" href="">. ¿Cómo recupero la contraseña si me la olvidé?<span id="sign-4" class="float-right"><b>+</b></span></a> </h2>
    <p id="4" style="display: none;">Al estar por iniciar sesión, se ecuentra un botón que indica que mediante ese pueden recuperar la contraseña, luego de ingresar el mail. </br></br> Si se presenta algún inconveniente <a href="{{ route('contact') }}">contactarnos</a> estamos disponibles para consultas las 24hs.</p>
  </div>

  <!-- <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(5)" href="">5. ¿Es posible que ?<span id="sign-5" class="float-right"><b>+</b></span></a> </h2>
    <p id="5" style="display: none;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente labore ipsa esse accusamus, numquam quod, fugiat nesciunt exercitationem necessitatibus est ut itaque dolorum adipisci! Sit perferendis laudantium dignissimos ad beatae!</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(6)" href="">6. ¿Pregunta 6?<span id="sign-6" class="float-right"><b>+</b></span></a> </h2>
    <p id="6" style="display: none;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident, eveniet. Fugit architecto illum iusto pariatur repellat tempora. Non ipsa ex iure sed unde, optio ea architecto culpa! Quidem, excepturi dolores.</p>
  </div>

  <div class="col-12 faq">
    <h2 class="faqs-head"><a onclick="displayText(7)" href="">7. ¿Pregunta 7?<span id="sign-7" class="float-right"><b>+</b></span></a> </h2>
    <p id="7" style="display: none;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias, soluta. Nostrum neque veritatis, odit facere harum eius, accusantium, assumenda iusto soluta officia eum ex dolores totam asperiores alias sint qui?
    </p>
  </div> -->


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