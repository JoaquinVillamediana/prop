@if(!empty($aProperties))
<div class="row">
  @foreach ($aProperties as $prop)
      <div class="col-md-4 mb-4 propertie">
        <div class="card">
          <div class="image">
            <img onerror="this.src='images/Logo_reducido_png.png';" src="@if(!empty($prop->image)) /images/publish/{{$prop->image}} @else /images/frontend/default_house.jpg @endif" class="card-img-top" alt="No se encontro la imagen">

            <div class="row row-caracs">

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="{{$prop->rooms}} Ambientes">{{$prop->rooms}}<i class="fas fa-home"></i></span>

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="{{$prop->bathrooms}} Baños">{{$prop->bathrooms}}<i class="fas fa-toilet"></i></span>

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="{{$prop->bedrooms}} Dormitorios">{{$prop->bedrooms}}<i class="fas fa-bed"></i></span>
            </div>
            
          </div>

          
          <div class="card-body">
            <h5 class="card-title mb-1"> {{$prop->name}}</h5>
            <h5 class="card-title mb-1"><b>{{$prop->symbol}}</b> {{ number_format($prop->price, 0, ',', '.')  }}</h5>
            <p class="card-text">{{$prop->introduction}}.</p>
            <a href="{{ route('propietie',$prop->id) }}" class="btn btn-moreinfo">Más información</a>
          </div>
        </div>
      </div>

      

    
      @endforeach
      <div class="pag col-12">
        {{ $aProperties->links() }}
      </div>

    </div>
    @endif
<script>$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</script>


     