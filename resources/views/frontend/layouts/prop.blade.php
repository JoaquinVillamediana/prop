<div class="row">
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

            <p class="card-text">4 baños y un par de boludeces.</p>
            <a href="#" class="btn btn-moreinfo">Más información</a>
          </div>
        </div>
        {{-- </a> --}}
      </div>

      

    
      
    </div>
<script>$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</script>


     