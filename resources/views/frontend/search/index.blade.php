@extends('frontend/layouts.app')

@include('frontend/layouts.header')



@section('content')
@include('frontend/layouts.slide')
<!-- Our Custom CSS -->
<link rel="stylesheet" href="css/frontend/propieties2.css">


<!------ Include the above in your HEAD tag ---------->

<section>
  
    <div class="card" id="card-prop">
      <div class="row ">
        <div class="col-md-4">
            <img src="images/index/home1.jpg" class="w-100">
          </div>
          <div class="col-md-8 px-3">
            <div class="card-block px-3">
              <h4 class="card-title mt-2">Departamento</h4>
              <p class="card-text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              
              <a href="#" class="btn btn-danger">Contactar</a>
            </div>
          </div>

        </div>
      </div>
    </div>
 
</section>



@endsection
