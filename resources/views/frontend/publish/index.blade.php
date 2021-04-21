@extends('frontend/layouts.app')
@include('frontend/layouts.header')
@section('content')
<!-- Bootstrap CSS -->

<div class="main-container container">

    <div class="section-user-type" data-section="0">

        <div class="options">
        
        <a href=" {{ route('publish_propertie_plan') }} "> <div class="option" data-value="1">
          
          <!-- <a href=" {{ route('personal') }} "> <div class="option" data-value="1"> -->
                <i class="fas fa-user-tie"></i>
                <p>Individual</p>
            </div>
            </a>
        <a href=" {{ route('publish_propertie_plan') }} "> <div class="option" data-value="2">

            <!-- <a href="{{ route('profesional') }}">     -->
            <!-- <div class="option" data-value="2"> -->
            <i class="fas fa-users"></i>
                <p>Estudio</p>
            </div>
            </a>

            <input type="hidden" id="user_type" name="user_type" value="">
        </div>
    </div>
</div>


<script>
    currentSection = 0;

    $(document).ready(() => {
        $('*[data-section="'+ currentSection +'"]').fadeIn(200);
    });

    $('.option').click(function() {
        let val = $(this).data('value');
        $('#user_type').val(val);
        
        $('*[data-section="'+ currentSection +'"]').fadeOut(200);

        currentSection += 1;
        
        setTimeout(() => {

            if(val == 1)
            {
                $('*[data-type="1"]').show();

            }else if(val == 2)
            {
                $('*[data-type="2"]').show();
            }

            $('*[data-section="'+ currentSection +'"]').fadeIn();
        },200)
    });


</script>
<style>
    
.main-container {
    min-height: calc(100% - 70px);
}

.main-container .section-user-type {
    display: none;
}

.main-container .section-user-type .options {
    display: flex;
    justify-content: space-around;
    min-height: calc(100% - 70px);
    align-items: center;
}

.main-container .section-user-type .option {
    background-color: #fff;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 250px;
    align-items: center;
    height: 250px;
    border-radius: 20px;
    box-shadow: 0 0 12px rgb(0 0 0 / 20%);
}

.main-container .section-user-type .option i {
    font-size: 80px;
    margin-bottom: 10px;
}

.main-container .section-user-type .option p {
    margin: 0;
    font-size: 26px;
}

.main-container .section-data .ind,
.main-container .section-data .study {
    display: none;
}
</style>
@include('frontend/layouts.footer')
@endsection