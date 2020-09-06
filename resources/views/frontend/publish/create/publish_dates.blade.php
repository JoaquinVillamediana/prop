@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')


<link rel="stylesheet" href="/css/frontend/edit_property.css">
<div class="mt-5 pb-5 container-fluid">

 


    <form method="POST" action="{{ route('store_dates') }}" enctype="multipart/form-data">
    <div class="container">
      <h1 class="text-center mb-2">Publicá tu propiedad</h1>
      <h4 class="">Aspectos básicos</h4>
      <div class="form-row">
        <div class="form-group col-md-6 col-12">
          <label for="">Titúlo</label>
          <input id="name" name="name" type="text" maxlength="60" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" aria-label="Text input with dropdown button"
            value="Titulo">
            @if ($errors->has('name'))
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir un nombre válido (max. 60).</strong>
            </span>
            @endif
        </div>
        <div class="form-group col-md-6 col-12">
          <label for="">Precio</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <select name="currency" class="currency-select" id="">
                @foreach ($aCurrencies as $currency)
                <option  value="{{$currency->id}}">
                  {{ $currency->symbol }}</option>
                @endforeach
              </select>
            </div>
            <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="Precio">
            @if ($errors->has('price'))
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir un precio válido.</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="">Opciones de compra</label>
          <div class="form-check no-min-height">
            <input class="form-check-input" type="checkbox" value="" id="credit">
            <label class="form-check-label" for="credit">
              Apto crédito
            </label>
          </div>

          <div class="form-check no-min-height">
            <input class="form-check-input" type="checkbox" value="" id="financing">
            <label class="form-check-label" for="financing">
              Apto Financiación
            </label>
          </div>
        </div>

      </div>
      <div class="form-group">
        <label for="">Expensas</label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">AR$</span>
          </div>
          <input type="number" name="expenses" class="form-control {{ $errors->has('expenses') ? 'is-invalid' : '' }}" value="Expensas">
          @if ($errors->has('expenses'))
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir un precio válido.</strong>
            </span>
            @endif
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6 col-12">
          <label for="">Introducción</label>
          <textarea id="introduction" class="form-control {{ $errors->has('introduction') ? 'is-invalid' : '' }}" name="introduction" rows="4" maxlength="60"
            cols="50">Escribe una introducción.</textarea>
            @if ($errors->has('introduction'))
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir una introducción válida (max. 60)</strong>
            </span>
            @endif
        </div>

        <div class="form-group col-md-6 col-12">
          <label for="">Descripción</label>
          <textarea id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" rows="4" maxlength="255"
            cols="50">Escribe una introducción</textarea>
            @if ($errors->has('description'))
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir una descripción válida (max. 255)</strong>
            </span>
            @endif
        </div>
      </div>

      <h4 class="">Características generales</h4>

      <div class="form-row pt-2">
        <div class="form-group col-lg-3">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><span class="carac-desc"><i
                    class="fas fa-couch mr-1"></i>Cuartos</span></span>
            </div>
            <input name="rooms" type="number" class="form-control {{ $errors->has('rooms') ? 'is-invalid' : '' }}" value="Núm. Cuartos">
          </div>
        </div>

        <div class="form-group col-lg-3 col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><span class="carac-desc"><i
                    class="fas fa-bed mr-1"></i>Habitaciones</span></span>
            </div>
            <input name="bedrooms" type="number" class="form-control {{ $errors->has('bedrooms') ? 'is-invalid' : '' }}" value="Núm. Habitacion">
          </div>
        </div>

        <div class="form-group col-lg-3 col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><span class="carac-desc"><i
                    class="fas fa-bath mr-1"></i>Baños</span></span>
            </div>
            <input name="bathrooms" type="number" class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}" value="Núm. Baños">
          </div>
        </div>

        <div class="form-group col-lg-3 col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><span class="carac-desc"><i
                    class="fas fa-ruler-combined"></i>Tamaño</span></span>
            </div>
            <input name="size" type="number" class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" value="Tamaño">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon1">m<sup>2</sup></span>

            </div>
          </div>
        </div>

        <div class="form-group col-lg-3 col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><span class="carac-desc"><i class="far fa-clock mr-1"></i>Antiguedad</span></span>
            </div>
            <input name="antiquity" type="number" class="form-control {{ $errors->has('antiquity') ? 'is-invalid' : '' }}" value="Antiguedad">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon1">Años</span>

            </div>
          </div>
        </div>


      </div>



      <h4>Servicios</h4>

      <div class="form-row">
        @if(!empty($aPropieties_services))
        @foreach ($aPropieties_services as $service)
        <div class="form-group col-md-2 col-sm-4 col-6">
          <div class="form-check">
            <input class="form-check-input" {{ !empty($service->service_checked) ? 'checked' : '' }} type="checkbox"
              value="{{ $service->id }}" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              {{ $service->name }}
            </label>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      <h4>Ambientes</h4>

      <div class="form-row">
        @if(!empty($aPropieties_ambientes))
        @foreach ($aPropieties_ambientes as $ambient)
        <div class="form-group col-md-2 col-sm-4 col-6">
          <div class="form-check">
            <input class="form-check-input" {{ !empty($ambient->ambient_checked) ? 'checked' : '' }} type="checkbox"
              value="{{ $ambient->id }}" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              {{ $ambient->name }}
            </label>
          </div>
        </div>
        @endforeach
        @endif
      </div>

      <h4>Comodidades</h4>

      <div class="form-row">
        @if(!empty($aPropieties_luxuries))
        @foreach ($aPropieties_luxuries as $luxury)
        <div class="form-group col-md-2 col-sm-4 col-6">
          <div class="form-check">
            <input class="form-check-input" {{ !empty($luxury->luxury_checked) ? 'checked' : '' }} type="checkbox"
              value="{{ $luxury->id }}" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              {{ $luxury->name }}
            </label>
          </div>
        </div>
        @endforeach
        @endif
      </div>




      <div class="buttons-container text-center">
        <a href="" class="btn btn-cancel mr-1">Cancelar</a>
        <button class="btn btn-update ml-1" type="submit">Crear</button>
      </div>
    </div>
  </form>


 
</div>








<script>
  function changeMainImage(id,type){
  if(type == 'image')
  {
    url = "/uploads/products/"+id;
    $('.main-image').attr('src',url);
    $('.main-video').attr('src','');
    $('.main-video').css('display','none');
    $('.main-image').css('display','block');
  }
  else
  {
    url = "/uploads/products/"+id;
    $('.main-video').attr('src',url);
    $('.main-image').attr('src','');
    $('.main-video').css('display','block');
    $('.main-image').css('display','none');
  }
  
}

  
</script>



<script type="text/javascript">
  function setFavoriteProductResponse(data) {
    
      if(data.favorite > 0) {
          $('#favBtnActive_'+data.productId).css('display', 'block');
          $('#favBtn_'+data.productId).css('display', 'none');
          
      } 
      else{
        $('#favBtnActive_'+data.productId).css('display', 'none');
        $('#favBtn_'+data.productId).css('display', 'block');
      }
  }
  
  function ajaxRequest(type, url, params, callBack) {

      jQuery.support.cors = true;
      params = JSON.stringify(params);

      $.ajax({
          type: type,
          url: url,
          data: params,
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          beforeSend: function () {
              //$('#ajaxLoader').show();
          },
          complete: function () {
              //$('#ajaxLoader').hide();
          },
          success: function (data) {
             //console.log("REQUEST [ " + type + " ] [ " + url + " ] SUCCESS");
             //console.log(data);
              window[callBack](data);
          },
          error: function (msg, url, line) {
             //console.log('ERROR !!! msg = ' + msg + ', url = ' + url + ', line = ' + line);
          }
      });
  }



</script>
<script src="/vendor/bootstrap-input-spinner.js"></script>
<script>
  $("input[type='number']").inputSpinner()
</script>

@include('frontend/layouts.footer')


@endsection