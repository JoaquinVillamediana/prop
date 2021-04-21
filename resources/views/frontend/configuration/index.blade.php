@extends('frontend/layouts.app')
@include('frontend/layouts.header')
<link rel="stylesheet" href="{{ asset('/css/frontend/configuration.css') }}">


@section('content')
<div class="row row-content mt-4">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">

      <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list"
        href="#list-profile" role="tab" aria-controls="profile"><i class="fas fa-user-alt"></i> <span>Prerfil</span>
      </a>
      <a class="list-group-item list-group-item-action" id="list-social-list" data-toggle="list" href="#list-social"
        role="tab" aria-controls="social"> <i class="fas fa-share-alt-square"></i> <span>Redes sociales</span> </a>

        <a class="list-group-item list-group-item-action" id="list-publication-list" data-toggle="list" href="#list-publication"
        role="tab" aria-controls="publication"> <i class="fas fa-home"></i> <span>Publicaciones</span> </a>
      <a class="list-group-item list-group-item-action" id="list-privacy-list" data-toggle="list" href="#list-privacy"
        role="tab" aria-controls="privacy"> <i class="fas fa-lock"></i> <span>Privacidad</span> </a>

      <a class="list-group-item list-group-item-action" id="list-support-list" data-toggle="list" href="#list-support"
        role="tab" aria-controls="support"> <i class="fas fa-question-circle"></i> <span>Soporte técnico</span> </a>

      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings"
        role="tab" aria-controls="settings"> <i class="fas fa-cog"></i> <span>General</span> </a>
    
    </div>
  </div>
  <div class="col-8 col-content">
    <div class="tab-content" id="nav-tabContent">
    <!-- UPDATE PROFILE -->
      <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        
        <h1 class="title">Condiguración de la cuenta</h1>
        <hr>
        <h2>Datos Principales</h2>
        
        <form method="POST" action="{{ route('edit_profile') }}" id="editForm">
          @csrf
          <div class="ind" data-type="1">

            @if(Auth::user()->user_type == 1)
            <div class="form-row">
              <div class="col-md-6 col-12" id="name">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
              </div>
              <div class="col-md-6 col-12" id="last_name">
                <label for="">Apellido</label>
                <input type="text" class="form-control" disabled value="{{Auth::user()->last_name}}">
              </div>
            </div>
            @else
            <div class="form-row">
              <div class="col-12" id="name">
                <label for="">Razon social</label>
                <input type="social" name="social" class="form-control" value="{{Auth::user()->social_reason}}">
              </div>
            </div>
            @endif

          </div>
          <div class="form-row">
            <div class="col-md-6 col-12" id="email">
              <label for="">Email</label>
              <input type="email" class="form-control" disabled value="{{Auth::user()->email}}">
            </div>
            <div class="col-md-6 col-12" id="phone">
              <label for="">Tel&eacute;fono</label>
              <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 col-12" id="password">
              <label for="">Contraseña</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="col-md-6 col-12" id="phone">
              <label for="">Repetir contraseña</label>
              <input type="password" name="password_check" class="form-control">
            </div>
          </div>

          <hr>
          <h2>Datos Adicionales</h2>

          <div class="form-row">
            <div class="col-md-6 col-12" id="address">
              <label for="">Direcci&oacute;n</label>
              <input type="text" name="address" class="form-control" value="{{ $oUsersProfile->address }}">
            </div>
            <div class="col-md-6 col-12" id="document">
              <label for="">{{ Auth::user()->user_type == 1 ? 'DNI' : '' }}{{ Auth::user()->user_type == 2 ? 'CUIT' : '' }}</label>
              <input type="text" name="document" class="form-control" value="{{ $oUsersProfile->document }}">
            </div>
          </div>

          <div class="form-row">

            <div class="col-12" id="origin_date">
              <label
                for="">{{ Auth::user()->user_type == 1 ? 'Año de Graduación' : '' }}{{ Auth::user()->user_type == 2 ? 'Año de Fundación' : '' }}</label>
              <input type="number" name="origin_date" class="form-control" maxlength="4" value="{{ $oUsersProfile->origin_date }}">
            </div>
          </div>

          <div class="form-row">
            <div class="col-12" id="description">
              <label for="">Descripci&oacute;n</label>
              <textarea type="text" name="description" class="form-control">{{ $oUsersProfile->description }}</textarea>
            </div>
          </div>

          <button class="btn btn-primary mt-4" type="submit">Editar</button>
        </form>
      </div>
      <!-- END UPDATE PROFILE -->  
      <!-- PRIVACY  -->
      <div class="tab-pane fade" id="list-privacy" role="tabpanel" aria-labelledby="list-privacy-list">
        <h1 class="title">Privacidad de la cuenta</h1>
        <hr>
        </br>
        <label><input type="checkbox" id="cbox1" value="1"> Aparecer en el buscador</label>
        <br>
        <label><input type="checkbox" id="cbox2" value="1"> Hacer públicos mis articulos y opiniones</label>
      </div>
      <!-- END PRIVACY -->
      <!-- SOCIAL NETWORKS -->
      <div class="tab-pane fade" id="list-social" role="tabpanel" aria-labelledby="list-social-list">
        <h1 class="title">Redes sociales</h1>
        <hr>
        </br>
        <form method="POST" action="{{ route('edit_socialmedia') }}" id="editForm">
          @csrf
          
          <div class="form-row">
            <div class="col-md-12 col-12 mt-4" id="facebook">
              <h4 class="normal"> Ingresar el enlace del perfil de <span>Facebook <i class="fab fa-facebook-f"></i> </span> </h4>
              <h4 class="responsive"> <i class="fas fa-link"></i> <i class="fab fa-facebook-f"></i>  </h4>
              <input type="text" name="facebook" class="form-control" placeholder="@if(!empty($oUserSocialMedia)) {{ $oUserSocialMedia->facebook }} @else Ingrese aquí el enlace... @endif" >
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-md-12 col-12 mt-4" id="linkedin">
              <h4 class="normal"> Ingresar el enlace del perfil de <span>Linkedin <i class="fab fa-linkedin-in"></i> </span> </h4>
              <h4 class="responsive"> <i class="fas fa-link"></i> <i class="fab fa-linkedin-in"></i>  </h4>
              <input type="text" name="linkedin" class="form-control" placeholder="@if(!empty($oUserSocialMedia)) {{ $oUserSocialMedia->linkedin }} @else Ingrese aquí el enlace.. @endif">
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-md-12 col-12 mt-4" id="instagram">
              <h4 class="normal"> Ingresar el enlace del perfil de <span>Instagram <i class="fab fa-instagram"></i> </span> </h4>
              <h4 class="responsive"> <i class="fas fa-link"></i> <i class="fab fa-instagram"></i>  </h4>   
              <input type="text" name="instagram" class="form-control" placeholder="@if(!empty($oUserSocialMedia)) {{ $oUserSocialMedia->instagram }} @else  Ingrese aquí el enlace..  @endif">
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-md-12 col-12 mt-4" id="website">
              <h4 class="normal"> Ingresar el enlace del perfil de <span>sitio web <i class="fas fa-globe"></i> </span> </h4>
              <h4 class="responsive"> <i class="fas fa-link"></i> <i class="fas fa-globe"></i> </h4>
              <input type="text" name="website" class="form-control" placeholder="@if(!empty($oUserSocialMedia)) {{ $oUserSocialMedia->website }} @else Ingrese aquí el enlace.. @endif">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-12 col-12 mt-4" id="twitter">
              <h4 class="normal"> Ingresar el enlace del perfil de <span>Twitter <i class="fab fa-twitter"></i> </span> </h4>
              <h4 class="responsive"> <i class="fas fa-link"></i> <i class="fab fa-twitter"></i> </h4>
              <input type="text" name="twitter" class="form-control" placeholder="@if(!empty($oUserSocialMedia)) {{ $oUserSocialMedia->twitter }} @else Ingrese aquí el enlace.. @endif">
            </div>
          </div>

          <button class="btn btn-primary mt-4" type="submit">Editar</button>
        </form>
      </div>
      <!-- END SOCIAL NETWORKS -->
      <!-- SUPPORT -->
      <div class="tab-pane fade" id="list-support" role="tabpanel" aria-labelledby="list-support-list">
        <h1 class="title">Consultar al soporte técnico</h1>
        <hr>
        <form action="{{route('technical_support')}}" method="POST">
          @csrf
          
          <div class="form-group">
            <label for="Title">Motivo de consulta</label>
            <input type="text" name ="title" id="title" class="form-control" placeholder="Escriba aquí el motivo de la consulta..">
          </div>
          
          <div class="form-group">
            <label for="text">Motivo de consulta</label>
            <textarea style="width:100%;" class="form-control" name="text" id="text"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Enviar</button>

        </form>
        
        @if(!empty($aSupportinfo))
          <hr>
          <h1 class="title"> Estado de consulta</h1>
          <table class="table table-bordered mt-4" id="dataTable_publication" width="100%" cellspacing="0">                        
            <thead>
              <tr>             
                <th><i class="fas fa-exclamation-triangle"></i> <span class="table-web"> Estado</span></th>                                
                <th><i class="fas fa-question"></i> <span class="table-web">   Titulo</span></th>  
                <th><i class="far fa-comment-alt"></i> <span class="table-web">   Respuesta</span></th>
                <th><i class="far fa-calendar-alt"></i> <span class="table-web">   Fecha</span></th>
              </tr>
            </thead>            
            <tbody>                  
              @foreach($aSupportinfo as $oSupport)
                <tr>                                
                  <td> @if($oSupport->status == 1 ) <i class="fas fa-times-circle"></i> @else <i class="fas fa-check-circle"></i> @endif</td>
                  <td> {{ $oSupport->title }}</td>
                  <td>@if($oSupport->answer == NULL) {{ "-" }} @else {{ $oSupport->answer }} @endif</td>
                  <td> @if($oSupport->created_at == NULL) {{"-"}} @else {{ $oSupport->created_at }} @endif </td>
                </tr>   
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
      <!-- END SUPPORT -->
      
      <!-- GENERAL -->
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <h1 class="title">General</h1>
        <hr>
        <?php $user_id_delete= Auth::user()->id; ?>
        <form id="deleteForm2_{{$user_id_delete}}" action="{{route('user_delete', $user_id_delete)}}" method="POST">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button type="button" id="submiBtn" class="btn-delete-user"  data-toggle="modal" onclick="openDelModal2({{$user_id_delete}});">Eliminar cuenta</button>
        </form> 
      </div>
      <!-- END GENERAL  -->
      <!-- PUBLISH -->
      <div class="tab-pane fade" id="list-publication" role="tabpanel" aria-labelledby="list-publication-list">
        <h1 class="title">Publicaciones</h1>
        <hr>
        </br>
        <table class="table table-bordered" id="dataTable_publication" width="100%" cellspacing="0">                        
          <thead>
            <tr>                                    
              <th><i class="fas fa-home"></i> / <i class="fas fa-building"></i> <span class="table-web">   Tipo</span></th>                                
              <th><i class="fas fa-heading"></i> <span class="table-web">   Titulo</span></th>  
              <th><i class="far fa-eye"></i> <span class="table-web">   Visible</span></th>
              <th><i class="fas fa-edit"></i> <span class="table-web">   Editar</span></th>

              <th><i class="far fa-trash-alt"></i> <span class="table-web">   Eliminar</span></th>
            </tr>
          </thead>       
          <tbody>
          @if(!empty($aPublications))
            @foreach($aPublications as $oPublications)
              <tr>                  
                <td> @if($oPublications->propietie_type_id == 1 ) <i class="fas fa-home"></i> @endif @if($oPublications->propietie_type_id == 2 )<i class="fas fa-building"></i> @endif @if($oPublications->propietie_type_id == 5 ) <i class="fas fa-warehouse"></i> @endif</td>
                <td> <a href="{{ route('propietie',$oPublications->id) }}">{{ $oPublications->name }}</a> </td>
                <td><a class="@if( $oPublications->visible == 1) article_index_btn_active @else article_index_btn @endif" href="" onClick="setProductVisible('{{ $oPublications->id }}');"><i id="visible_icon_{{$oPublications->id}}" class="fas fa-eye"></i></a></td>
                <td><a class="btn btn-warning btn-circle my-custom-confirmation" href="{{ route('mis_propiedades.edit',$oPublications->id) }}"><i class="fas fa-edit"></i></a></td>
                
                <td>
                  <form id="deleteForm_{{$oPublications->id}}" action="{{route('publication_delete', $oPublications->id)}}" method="POST">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" id="submiBtn" class="btn btn-warning btn-circle my-custom-confirmation" data-toggle="modal" onclick="openDelModal({{$oPublications->id}});"><i class="fa fa-times"></i></button>
                  </form>                
                </td>
              </tr>   
            @endforeach
          @endif
          </tbody>
        </table>
      </div>
      <!-- END PUBLISH  -->
    </div>
  </div>
  @include('layouts.modals')
</div>

<script type="text/javascript">
        function openDelModal(id) {
        formId = id;
        $('#deleteModal').modal('show');
    }
    function openDelModal2(id) {
        formUserId = id;
        $('#deleteaccountModal').modal('show');
    }
    function setProductVisible(productId) {
        
        event.preventDefault();
       
        
        var params = new Object();
        params._token = "{{ csrf_token() }}";
        params.productId = productId;
        
        ajaxRequest("POST", "{{route('product_visible')}}", params, "setVisibleProductResponse");
    }
    
    function setVisibleProductResponse(data) {

        var btn = $('#visible_icon_' + data.productId);
        
        if(data.visible > 0) {
            btn.css('color', '#a7d158');
        } else {
            btn.css('color', '#343a40');
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
@include('frontend/layouts.footer')
@endsection