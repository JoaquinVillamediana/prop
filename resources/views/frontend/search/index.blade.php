@extends('frontend/layouts.app')

@include('frontend/layouts.header')



@section('content')
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
              <h4 class="card-title mt-2">  {{$optype->name}} </h4>
              <p class="card-text"> {{$optype->description}} </p>
              <a href="{{ route('propietie',$optype->id) }}" class="btn btn-danger">Contactar</a>
                
                <!--  -->
                <div class="row row-caracs">

                  <span class="characteristic" data-toggle="tooltip" data-placement="top" title="3 Ambientes">{{$optype->rooms}}<i class="fas fa-home"></i></span>

                  <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Baño">1<i class="fas fa-toilet"></i></span>

                  <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Dormitorio">2<i class="fas fa-bed"></i></span>
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
