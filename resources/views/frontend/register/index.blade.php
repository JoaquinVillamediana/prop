@extends('frontend/layouts.app')
@include('frontend/layouts.header')

@section('content')

<link rel="stylesheet" href="/css/frontend/register.css">

<div class="container main-container">
    <h1>Registro de usuario</h1>
    <form method="POST" action="{{route('register_users.store')}}">
        @csrf
        <ul class="user-type">
            <li>
                <input type="radio" id="type-search" {{ old('user-type') == 1 ? 'checked' : '' }} value="1" name="user-type" />
                <label for="type-search">Para buscar</label>
            </li>
            <li>
                <input type="radio" {{ old('user-type') == 2 ? 'checked' : '' }} {{ empty(old('user-type')) ? 'checked' : '' }} id="type-publish" value="2" name="user-type" />
                <label for="type-publish">Para publicar</label>
            </li>

        </ul>
        <div class="form-group" id="publish_type_div">
            <label for="">Tipo de cuenta</label>
            <select name="publish_type" class="form-control" id="publish_type">
                <option  {{ old('publish_type') == 1 ? 'selected' : '' }} {{ empty(old('publish_type')) ? 'selected' : '' }} value="1">Profesional</option>
                <option {{ old('publish_type') == 2 ? 'selected' : '' }} value="2">Personal</option>
            </select>
        </div>

        <div class="form-group" id="company_name_div">
            <label for="">Nombre de la compañia <span class="text-danger"><sup>(*)</sup></span></label>
            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                value="{{ old('company_name') }}"  >
            @error('company_name')
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir un nombre válido (max. 60).</strong>
            </span>
            @enderror
        </div>


        <div class="form-row" id="name_last_div">
            <div class="form-group col-md-6 col-12">
                <label for="">Nombre  <span class="text-danger"><sup>(*)</sup></span></label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}"  >
                @error('name')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir un nombre válido (max. 60).</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="">Apellido  <span class="text-danger"><sup>(*)</sup></span></label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                    name="last_name" value="{{ old('last_name') }}"  >
                @error('last_name')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir un apellido válido (max. 60).</strong>
                </span>
                @enderror
               
            </div>
        </div>

        <div class="form-row" id="email_phone_div">
            <div class="form-group col-md-6 col-12">
                <label for="">Email  <span class="text-danger"><sup>(*)</sup></span></label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror @error('duplicated_email_error') is-invalid @enderror" name="email"
                    value="{{ old('email') }}"  >
                @error('email')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir un email válido (max. 60).</strong>
                </span>
                @enderror
                @error('duplicated_email_error')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Este email ya se encuentra registrado.</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="">Teléfono</label>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}"  >
                @error('phone')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir un teléfono válido (max. 60).</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group" id="cuit_div">
            <label for="">CUIT  <span class="text-danger"><sup>(*)</sup></span></label>
            <input id="cuit" type="text" class="form-control @error('cuit') is-invalid @enderror" name="cuit"
                value="{{ old('cuit') }}"   >
            @error('cuit')
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir un CUIT válido.</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="dni_div">
            <label for="">DNI / PASAPORTE  <span class="text-danger"><sup>(*)</sup></span></label>
            <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni"
                value="{{ old('dni') }}"   >
            @error('dni')
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir un DNI válido.</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="reason_div">
            <label for="">Razón social  <span class="text-danger"><sup>(*)</sup></span></label>
            <input id="social_reason" type="text" class="form-control @error('social_reason') is-invalid @enderror" name="social_reason"
                value="{{ old('social_reason') }}"  >
            @error('social_reason')
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir una razón social válida (max. 60).</strong>
            </span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-12">
                <label for="">Contraseña  <span class="text-danger"><sup>(*)</sup></span></label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" value="{{ old('password') }}"  >
                @error('password')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir una contraseña válida (min. 8 - max. 60).</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="">Confirmar contraseña  <span class="text-danger"><sup>(*)</sup></span></label>
                <input id="password_confirm" type="password"
                    class="form-control @error('password_confirm') is-invalid @enderror  @error('passwords_not_equal') is-invalid @enderror" name="password_confirm"
                    value="{{ old('password_confirm') }}"  >
                @error('password_confirm')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir una contraseña válida (min. 8 - max. 60).</strong>
                </span>
                @enderror
                @error('passwords_not_equal')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Las contraseñas deben coincidir.</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <p class="text-danger">(*) Items obligatorios. Al introducir un teléfono aceptas que este sea publicado.</p>
        <button type="submit" class="d-block m-auto btn btn-prop">Crear cuenta</button>
    </form>









</div>



<script>
$(document).ready(function() {
    let type = {!! json_encode(old('user-type')) !!};
    if(type == undefined)
    {
        type = 2;
    }
    if(type == 1)//search
    {
        $('#publish_type_div').hide();
        $('#company_name_div').hide();
        $('#cuit_div').hide();
        $('#reason_div').hide();
        $('#dni_div').hide();

        $('#name_last_div').css('display','flex');
        $('#email_phone_div').show();
    }
    if(type == 2)//publish
    {
        
        $('#dni_div').hide();
        $('#name_last_div').hide();

        $('#email_phone_div').show();
        $('#publish_type_div').show();
        $('#company_name_div').show();
        $('#reason_div').show();
        $('#cuit_div').show();

        type = $('#publish_type').val();

        if(type == 1) //profesional
        {
        $('#name_last_div').hide();
        $('#company_name_div').show();
        $('#cuit_div').show();
        $('#dni_div').hide();
        $('#reason_div').show();
        } 
         if(type == 2) //personal
        {
        $('#name_last_div').css('display','flex');
        $('#company_name_div').hide();
        $('#cuit_div').hide();
        $('#dni_div').show();
        $('#reason_div').hide();

        }
    }
});



$("input[name=user-type]").click(function () {    
    let type = $(this).val();
    $(this).prop('checked',true);

    if(type == 1)//search
    {
        $('#publish_type_div').hide();
        $('#company_name_div').hide();
        $('#cuit_div').hide();
        $('#reason_div').hide();
        $('#dni_div').hide();

        $('#name_last_div').css('display','flex');
        $('#email_phone_div').show();
    }
    if(type == 2)//publish
    {
        
        $('#dni_div').hide();
        $('#name_last_div').hide();

        $('#email_phone_div').show();
        $('#publish_type_div').show();
        $('#company_name_div').show();
        $('#reason_div').show();
        $('#cuit_div').show();

        $("#publish_type").val("1");
    }
    
    });


$('#publish_type').change(function () {
    let type = $(this).val();

    if(type == 1) //profesional
    {
        $('#name_last_div').hide();
        $('#company_name_div').show();
        $('#cuit_div').show();
        $('#dni_div').hide();
        $('#reason_div').show();
    } 
    if(type == 2) //personal
    {
        $('#name_last_div').css('display','flex');
        $('#company_name_div').hide();
        $('#cuit_div').hide();
        $('#dni_div').show();
        $('#reason_div').hide();

    }
});
</script>
@include('frontend/layouts.footer')

@endsection