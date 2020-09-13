@extends('frontend/layouts.app')
@include('frontend/layouts.header')

@section('content')
<link rel="stylesheet" href="/css/frontend/register.css">

<div class="container main-container">
    <h1>Registro de usuario</h1>
    <form action="">
        <ul class="user-type">
            <li>
                <input type="radio" id="type-search" value="1" name="user-type" />
                <label for="type-search">Para buscar</label>
            </li>
            <li>
                <input type="radio" checked id="type-publish" value="2" name="user-type" />
                <label for="type-publish">Para publicar</label>
            </li>

        </ul>
        <div class="form-group" id="publish_type_div">
            <label for="">Tipo de cuenta</label>
            <select name="publish_type" class="form-control" id="publish_type">
                <option selected value="1">Profesional</option>
                <option value="2">Personal</option>
            </select>
        </div>

        <div class="form-group" id="company_name_div">
            <label for="">Nombre de la compañia</label>
            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                value="{{ old('company_name') }}" required>
            @error('company_name')
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir un nombre válido (max. 60).</strong>
            </span>
            @enderror
        </div>


        <div class="form-row" id="name_last_div">
            <div class="form-group col-md-6 col-12">
                <label for="">Nombre</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir un nombre válido (max. 60).</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="">Apellido</label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                    name="last_name" value="{{ old('last_name') }}" required>
                @error('last_name')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir un apellido válido (max. 60).</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-row" id="email_phone_div">
            <div class="form-group col-md-6 col-12">
                <label for="">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required>
                @error('email')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir un email válido (max. 60).</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="">Teléfono</label>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}" required>
                @error('phone')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir un teléfono válido (max. 60).</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group" id="cuit_div">
            <label for="">CUIT</label>
            <input id="cuit" type="text" class="form-control @error('cuit') is-invalid @enderror" name="cuit"
                value="{{ old('cuit') }}"  required>
            @error('cuit')
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir un CUIT válido.</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="dni_div">
            <label for="">DNI / PASAPORTE</label>
            <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni"
                value="{{ old('dni') }}"  required>
            @error('dni')
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir un DNI válido.</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="reason_div">
            <label for="">Razón social</label>
            <input id="social_reason" type="text" class="form-control @error('social_reason') is-invalid @enderror" name="social_reason"
                value="{{ old('social_reason') }}" required>
            @error('social_reason')
            <span id="" class="invalid-feedback" role="alert" style="display:block;">
                <strong>Debe introducir una razón social válida (max. 60).</strong>
            </span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 col-12">
                <label for="">Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" value="{{ old('password') }}" required>
                @error('password')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Debe introducir una contraseña válida (min. 8 - max. 60).</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="">Confirmar contraseña</label>
                <input id="password_confirm" type="password"
                    class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm"
                    value="{{ old('password_confirm') }}" required>
                @error('password_confirm')
                <span id="" class="invalid-feedback" role="alert" style="display:block;">
                    <strong>Las contraseñas deben coincidir.</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="d-block m-auto btn btn-prop">Crear cuenta</button>
    </form>


    {{-- <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          PARA BUSQUEDA
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}
</div>

<div class="card-body">
    <form method="POST" action="{{ route('store_register_users') }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input id="type" type="hidden" name="type" value="1">

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

            <div class="col-md-6">
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                    name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

            <div class="col-md-6">
                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}" required autocomplete="phone">

                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>



        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Registrarme') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
<div class="card">
    <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
            <button class="btn btn-link collapsed mb-3" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="false" aria-controls="collapseTwo">
                PARA PUBLICAR
            </button>
        </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('store_register_users_publish') }}" role="form"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}




                                <div class="form-group row">
                                    <label for="company_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Tipo de usuario') }}</label>

                                    <div class="col-md-6">
                                        <input type="radio" id="type1" name="type" value="2">
                                        <label for="type1">Profesional</label><br>
                                        <input type="radio" id="type2" name="type" value="1">
                                        <label for="type2">Particular</label><br>
                                        @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="company_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                    <div class="col-md-6">
                                        <input id="company_name" type="text"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            name="company_name" value="{{ old('company_name') }}" required
                                            autocomplete="company_name" autofocus>

                                        @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="social_razon"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Apellido / Razón social') }}</label>

                                    <div class="col-md-6">
                                        <input id="social_razon" type="text"
                                            class="form-control @error('social_razon') is-invalid @enderror"
                                            name="social_razon" value="{{ old('social_razon') }}" required
                                            autocomplete="social_razon" autofocus>

                                        @error('social_razon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="cuit"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Cuit o DNI') }}</label>

                                    <div class="col-md-6">
                                        <input id="cuit" type="number"
                                            class="form-control @error('cuit') is-invalid @enderror" name="cuit"
                                            value="{{ old('cuit') }}" required autocomplete="cuit">

                                        @error('cuit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrarme') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div> --}}









</div>



<script>

$("input[name=user-type]").click(function () {    
    let type = $(this).val();
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