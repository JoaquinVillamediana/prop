@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')


<link rel="stylesheet" href="/css/frontend/contact.css">
<div class="container">
  <form  method="POST" action="{{ route('send_mail') }}" role="form" enctype="multipart/form-data">
  {{ csrf_field() }}
    <label for="fname">Nombre y apellido</label></br>
    <input type="text" id="name" name="name" placeholder="Ej: Eduardo Perez">
</br>
    <label for="lname">Email</label></br>
    <input type="text" id="email" name="email" placeholder="Ej: nombre@mail.com">
    </br>
    <!-- <label for="lname">Email</label></br>
    <input type="email" id="email" name="email" placeholder="Ej: nombre@mail.com">
    </br> -->
    <label for="lname">Asunto</label></br>
    <input type="text" id="subject" name="subject" placeholder="Ej: Consulta">
    </br>
    <!-- <label for="country">Localidad</label></br>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
    </br> -->
    <label for="subject">Mensaje</label></br>
    <textarea id="message" name="message" placeholder="Me gustaría consultar sobre.." style="height:200px"></textarea>
    </br>
    <button type="submit" class="btn shop-btn">Enviar</button>

  </form>
</div>

</br>













@include('frontend/layouts.footer')


@endsection