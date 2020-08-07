@extends('frontend/layouts.app')

@include('frontend/layouts.header')

@section('content')


<link rel="stylesheet" href="/css/frontend/product.css">
<div class="mt-5 pb-5 container-fluid">

      

 <div class="container">
  <div class="row">
    <div class="col-md-1 col-12">
      <div class="row">

      </div>
      
    </div>

    <div class="col-md-6 col-12">
     
<!--  -->

          <div class="col-12 mt-2 mb-4 div-main-image">
            <img class=" w-100 main-image"  style="width: 100%;max-height:600px;object-fit:cover" src="/images/index/home1.jpg" >
            <video  class=" w-100 main-video" style="width: 100%;max-height:600px;object-fit:cover;display:none"  loop muted autoplay src="">Your browser does not support HTML5 video.</video>
          </div>
     

<!--  -->

    </div>

    <div class="col-md-5 col-12">
      <div class="row mt-2 mt-md-0">
        <div class="col-12">
   
        </div>
        <div class="col-12 mt-3">
          <h5 class="product-title">Departamento de prueba</h5>
        </div>
        <div class="col-12">
          Descripcion
        </div>
        <div class="col-12 mt-2">
         
              <p class="card-text product-price" style="color:#000;">U$D 250.000 </p>
          
        </div>

      <button  type="submit"  class="d-inline btn btn-add-cart">Contactar</button>
      </div>
    </div>

  </div>


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