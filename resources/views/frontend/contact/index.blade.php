@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')


<link rel="stylesheet" href="/css/frontend/contact.css">
<div class="container">
  <form action="action_page.php">

    <label for="fname">Nombre</label></br>
    <input type="text" id="fname" name="firstname" placeholder="Ej: Eduardo">
</br>
    <label for="lname">Apellido</label></br>
    <input type="text" id="lname" name="lastname" placeholder="Ej: Perez">
    </br>
    <label for="country">Localidad</label></br>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
    </br>
    <label for="subject">Mensaje</label></br>
    <textarea id="subject" name="subject" placeholder="Me gustaría consultar sobre.." style="height:200px"></textarea>
    </br>
    <input type="submit" value="Enviar">

  </form>
</div>

</br>













@include('frontend/layouts.footer')


@endsection