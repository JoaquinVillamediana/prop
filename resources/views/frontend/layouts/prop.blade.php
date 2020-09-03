@if(!empty($aPropieties))
<div class="row">
  @foreach ($aPropieties as $prop)
      <div class="col-md-4 mb-4 propertie">
      {{-- <a href="{{ route('propietie') }}"> --}}
        <div class="card">
          <div class="image">
            <img src="images/index/home1.jpg" class="card-img-top" alt="...">

            <div class="row row-caracs">

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="3 Ambientes">3<i class="fas fa-home"></i></span>

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Baño">1<i class="fas fa-toilet"></i></span>

              <span class="characteristic" data-toggle="tooltip" data-placement="top" title="1 Dormitorio">1<i class="fas fa-bed"></i></span>
            </div>
            
          </div>

          <div class="card-body">
            <h5 class="card-title mb-0"> {{$prop->name}}</h5>

            <p class="card-text">{{$prop->description}}.</p>
            <a href="{{ route('propietie',$prop->id) }}" class="btn btn-moreinfo">Más información</a>
          </div>
        </div>
        {{-- </a> --}}
      </div>

      

    
      @endforeach
      <div class="pag col-12">
        {{ $aPropieties->links() }}
      </div>

    </div>
    @endif
<script>$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</script>


     