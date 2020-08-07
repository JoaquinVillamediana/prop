@extends('frontend/layouts.app')

@include('frontend/layouts.header')



@section('content')
@include('frontend/layouts.slide')
<!-- Our Custom CSS -->
<link rel="stylesheet" href="css/frontend/propieties2.css">


<div class="card" id="card-prop">
  <h5 class="card-header">Departamento</h5>
  <div class="card-body">
    <h5 class="card-title"> USD 200.000</h5>
    <p class="card-text">Descripcion xd.</p>
    <a href="#" class="btn btn-primary">Contactar</a>
  </div>
</div>
</div>

@endsection
