@extends('frontend/layouts.app')

@include('frontend/layouts.header')



@section('content')
@include('frontend/layouts.ourJs')
@include('frontend/layouts.slide')
<!-- Our Custom CSS -->
<link rel="stylesheet" href="css/frontend/propieties2.css">


<!------ Include the above in your HEAD tag ---------->
<h4>{{$ubicacion}}</h4>


<section>

  @if(!empty($aPropieties))
    @foreach($aPropieties as $optype)

      <div class="card" id="card-prop">

        <div class="row ">
          <div class="col-md-4">
            <img src="images/index/home1.jpg" class="w-100">
          </div>
          <div class="col-md-8 px-3">
          
   <a href="{{ route('propietie',$optype->id) }}">
            <div class="card-block px-3">
              <h3 class="card-title mt-2">  {{$optype->name}} </h3>
              <p class="card-text"> {{$optype->description}} </p>
          
                <!--  -->
                <div class="row row-caracs">
                  <h3> USD{{$optype->price}}</h3>
                  <span class="characteristic" data-toggle="tooltip" data-placement="top" title="3 Ambientes">{{$optype->rooms}}<i class="fas fa-home"></i></span>

                  <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Baño">1<i class="fas fa-toilet"></i></span>

                  <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Dormitorio">2<i class="fas fa-bed"></i></span>

                
              <a href="{{ route('propietie',$optype->id) }}" class="btn btn-danger ml-auto mr-4 mb-4">Contactar</a>
           
              </div>
            <!--  -->
            </div>
</a>
          </div>
        </div>
      
      </div>
     
                 @endforeach
              
   
                
              @endif


 
</section>



@endsection
