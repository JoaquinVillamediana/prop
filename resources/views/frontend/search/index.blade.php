@extends('frontend/layouts.app')

@include('frontend/layouts.header')



@section('content')
@include('frontend/layouts.slide')
<!-- Our Custom CSS -->
<link rel="stylesheet" href="css/frontend/propieties2.css">


<!------ Include the above in your HEAD tag ---------->
<h4>Departamento en Belgrano, Capital Federal</h4>


<section>

  @if(!empty($aPropieties))
    @foreach($aPropieties as $optype)
      <div class="card" id="card-prop">
        <div class="row ">
          <div class="col-md-4">
            <img src="images/index/home1.jpg" class="w-100">
          </div>
          <div class="col-md-8 px-3">
            <div class="card-block px-3">
              <h4 class="card-title mt-2">  {{$optype->name}} </h4>
              <p class="card-text"> {{$optype->description}} </p>
              <a href="#" class="btn btn-danger">Contactar</a>
            </div>
          </div>
        </div>
      </div>
   
                 @endforeach
              
   
                
              @endif


 
</section>



@endsection
