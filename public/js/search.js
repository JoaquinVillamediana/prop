var oSearch = new Object();
var aLocalities;


var slider_price_min = document.getElementById("slider-price-min");
var price_min = document.getElementById("price-min");
var slider_price_max = document.getElementById("slider-price-max");
var price_max = document.getElementById("price-max");


slider_price_max.oninput = function() {
    price_max.innerHTML = formatNumber.new(this.value);
    oSearch.max_price = this.value;
}
slider_price_min.oninput = function() {
    price_min.innerHTML = formatNumber.new(this.value);
    oSearch.min_price = this.value;
}



var slider_expenses_min = document.getElementById("slider-expenses-min");
var expenses_min = document.getElementById("expenses-min");
var slider_expenses_max = document.getElementById("slider-expenses-max");
var expenses_max = document.getElementById("expenses-max");
slider_expenses_max.oninput = function() {
    expenses_max.innerHTML = formatNumber.new(this.value);
    oSearch.max_expenses = this.value;
}
slider_expenses_min.oninput = function() {
    expenses_min.innerHTML = formatNumber.new(this.value);
    oSearch.min_expenses = this.value;
}


$(document).ready(() => {
    $('.options').hide();
    aLocalities = localities.map((element) => {
        return element.nombre;
    });
    oSearch.max_price = $('#slider-price-max').val();
    oSearch.min_price = $('#slider-price-min').val();
    oSearch.max_expenses = $('#slider-expenses-max').val();
    oSearch.min_expenses = $('#slider-expenses-min').val();
    oSearch.currency = $('#currency').val();


    if (default_type != null) {
        $('#optype' + default_type).prop('checked', true);
    }

    if (default_property != null) {
        $('#prop_type' + default_property).prop('checked', true);
    }

    if (default_locality != null) {
        oSearch.locality = default_locality;
        selectLocation(default_locality);
    }


    oSearch.propietie_type_id = $("input[name='prop_type']:checked").val();
    oSearch.operation_type_id = $("input[name='optype']:checked").val();

    ajaxRequest("GET", '../getFilterProperties', oSearch, "updateProps");
});


$('#location').on("input", () => {
    displayLocalities($('#location'));

});


$(document).on('click', '.option', function() {
    event.preventDefault();
    let locality_id = $(this).data('locality_id');
    selectLocation(locality_id);
    oSearch.locality = $('#locality').val();
});



$(document).on('click', '.bedrooms', function() {
    let quantity = $(this).data('bedrooms');
    let aButtons = $('.bedrooms');
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        oSearch.bedrooms = null;
    } else {
        aButtons.removeClass('active');
        $(this).addClass('active')
        oSearch.bedrooms = quantity;
    }

});

$(document).on('click', '.rooms', function() {
    let quantity = $(this).data('rooms');
    let aButtons = $('.rooms');
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        oSearch.rooms = undefined;
    } else {
        aButtons.removeClass('active');
        $(this).addClass('active')
        oSearch.rooms = quantity;
    }

});

$(document).on('click', '.btn-search', function() {

    oSearch.propietie_type_id = $("input[name='prop_type']:checked").val();
    oSearch.operation_type_id = $("input[name='optype']:checked").val();
    oSearch.currency = $('#currency').val();

    ajaxRequest("GET", '../getFilterProperties', oSearch, "updateProps");
});

function updateProps(data) {
    $('#props').empty();
    setSelectedTags();
    if (data.length > 0) {
        data.forEach(element => {
            $('#props').append('<div class="card" id="card-prop"><div class="row "><div class="col-xl-6 col-12"><div id="carouselPropControls-' + element.id + '" class="carousel slide" data-ride="carousel"><div class="carousel-inner"><div class="carousel-item active"><img src="/images/index/home1.jpg" class="d-block w-100"></div><div class="carousel-item"><img src="/images/index/home1.jpg" class="d-block w-100"></div><div class="carousel-item"><img src="/images/index/home1.jpg" class="d-block w-100"></div></div><a class="carousel-control-prev" href="#carouselPropControls-' + element.id + '" role="button"data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselPropControls-' + element.id + '"role="button" data-slide="next"><span class="carousel-control-next-icon"aria-hidden="true"></span><span class="sr-only">Next</span></a></div></div><div class="col-xl-6 col-12"><a href="http://192.168.0.200:8080/propietie/' + element.id + '"><div class="card-block "><h3 class="card-title mt-2 "> ' + element.name + ' </h3><h3 class="price"><span class="currency"><span class="currency-symbol">$</span></span> ' + formatNumber.new(element.price) + '</h3><p class="card-text description">' + element.description + '</p><p class="characteristics"><span id="rooms" class="characteristic" data-toggle="tooltip" data-placement="top"title="' + element.rooms + ' Ambientes"><i class="fas fa-home"></i>Cuartos <span class="quantity">' + element.rooms + '</span></span><span id="bathrooms" class="characteristic" data-toggle="tooltipdata-placement="top"title="' + element.bathrooms + ' Baño"><i class="fas fa-toilet"></i>Baños <span class="quantity">' + element.bathrooms + '</span></span><span id="bedrooms" class="characteristic" data-toggle="tooltipdata-placement="top"title="' + element.bedrooms + ' Dormitorio"><i class="fas fa-bed"></i>Dormitorios <span class="quantity">' + element.bedrooms + '</span></span> <span id="size" class="characteristic" data-toggle="tooltipdata-placement="top"title="' + element.size + ' m2"><i class="fas fa-bed"></i>Tamaño <span class="quantity">' + element.size + 'm<sup>2</sup></span></span></p><a href="http://192.168.0.200:8080/propietie/' + element.id + '" id="btncontacto" class="btn btn-contact d-block">Ver más</a></div></a></div></div></div>')
        });
    } else {
        $('#props').append('<div class="row not-found"><h2>Lo sentimos! No encontramos propiedades compatibles con tu busqueda</h2><div class="not-found-lottie"><script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://assets4.lottiefiles.com/packages/lf20_g8sNgp.json" background="transparent"speed="1" style="width: 200px; height: 200px;" autoplay></lottie-player></div></div>');
    }

    oCurrency = aCurrencies.find(element => element.id == oSearch.currency);
    $('.currency-symbol').html(oCurrency.symbol);

}


function setSelectedTags() {
    $('.selected-tags').empty();
    if (oSearch.propietie_type_id == 1) {
        $('.selected-tags').append('<span class="badge badge-light selected-tag">Casa</span>');
    }
    if (oSearch.propietie_type_id == 2) {
        $('.selected-tags').append('<span class="badge badge-light selected-tag">Departamento</span>');
    }
    if (oSearch.operation_type_id == 1) {
        $('.selected-tags').append('<span class="badge badge-light selected-tag">Compra</span>');
    }
    if (oSearch.operation_type_id == 2) {
        $('.selected-tags').append('<span class="badge badge-light selected-tag">Alquiler</span>');
    }
    if (oSearch.rooms > 0) {
        $('.selected-tags').append('<span class="badge badge-light selected-tag">' + oSearch.rooms + ' Ambientes</span>');
    }
    if (oSearch.bedrooms > 0) {
        $('.selected-tags').append('<span class="badge badge-ligh selected-tag">' + oSearch.bedrooms + ' Dormitorios</span>');
    }

}


$(document).on('click', '#order-by', function() {
    event.preventDefault();
    if ($(".order-options").hasClass("visible")) {
        $('.order-options').hide();
        $(".order-options").removeClass('visible');
        $("#order-arrow").removeClass('rotate');
    } else {
        $('.order-options').show();
        $(".order-options").addClass('visible');
        $("#order-arrow").addClass('rotate');
    }

});

$(document).on('click', '.order-option', function() {
    event.preventDefault();
    $('.order-options').hide();
    $(".order-options").removeClass('visible');
    oSearch.propietie_type_id = $("input[name='prop_type']:checked").val();
    oSearch.operation_type_id = $("input[name='optype']:checked").val();
    oSearch.order = $(this).data('order');
    oSearch.currency = $('#currency').val();
    $('.order-selected').html($(this).html() + '<i id="order-arrow"class="ml-1 fas fa-angle-down"></i>');
    ajaxRequest("GET", '../getFilterProperties', oSearch, "updateProps");
});



function deleteFilters() {
    oSearch = new Object();

    let aButtons = $('.rooms');
    aButtons.removeClass('active');

    aButtons = $('.bedrooms');
    aButtons.removeClass('active');

    $('#optype2').prop('checked', true);

    $('#prop_type2').prop('checked', true);

    $('#location').empty();
    $('#locality').empty();
    $('.options').hide();

    $("#currency").val("1");

    $('#slider-price-min').val('0');
    $('#slider-price-max').val('10000000');
    $('#slider-expenses-max').val('100000');
    $('#slider-expenses-min').val('0');

    price_max.innerHTML = formatNumber.new('10000000');
    price_min.innerHTML = formatNumber.new('0');
    expenses_max.innerHTML = formatNumber.new('100000');
    expenses_min.innerHTML = formatNumber.new('0');

    oSearch.max_price = $('#slider-price-max').val();
    oSearch.min_price = $('#slider-price-min').val();
    oSearch.max_expenses = $('#slider-expenses-max').val();
    oSearch.min_expenses = $('#slider-expenses-min').val();
    oSearch.currency = $('#currency').val();

    oSearch.propietie_type_id = $("input[name='prop_type']:checked").val();
    oSearch.operation_type_id = $("input[name='optype']:checked").val();

    ajaxRequest("GET", '../getFilterProperties', oSearch, "updateProps");
}