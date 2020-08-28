var oSearch = new Object();
var aLocalities;


var slider_price_min = document.getElementById("slider-price-min");
var price_min = document.getElementById("price-min");
var slider_price_max = document.getElementById("slider-price-max");
var price_max = document.getElementById("price-max");


slider_price_max.oninput = function() {
    price_max.innerHTML = this.value;
    oSearch.max_price = this.value;
}
slider_price_min.oninput = function() {
    price_min.innerHTML = this.value;
    oSearch.min_price = this.value;
}



var slider_expenses_min = document.getElementById("slider-expenses-min");
var expenses_min = document.getElementById("expenses-min");
var slider_expenses_max = document.getElementById("slider-expenses-max");
var expenses_max = document.getElementById("expenses-max");
slider_expenses_max.oninput = function() {
    expenses_max.innerHTML = this.value;
    oSearch.max_expenses = this.value;
}
slider_expenses_min.oninput = function() {
    expenses_min.innerHTML = this.value;
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
});


$('#location').on("input", () => {
    displayLocalities($('#location'));

});


$(document).on('click', '.option', function() {
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
        oSearch.bedrooms = undefined;
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

    ajaxRequest("GET", 'getFilterProperties', oSearch, "updateProps");
});

function updateProps(data) {
    $('#prop-container').empty();
    if (data.length > 0) {
        data.forEach(element => {
            $('#prop-container').append('<div class="card" id="card-prop"><div class="row "><div class="col-md-4"><img src="images/index/home1.jpg" class="w-100"></div><div class="col-md-8"><a href=""><div class="card-block "><h3 class="card-title mt-2"> ' + element.name + ' </h3><p class="card-text"> ' + element.description + ' </p><div class="row row-caracs"><h3> USD' + element.price + '</h3><span id="rooms" class="characteristic" data-toggle="tooltip" data-placement="top"title="3 Ambientes">' + element.rooms + '<i class="fas fa-home"></i></span><span id="bathrooms" class="characteristic" data-toggle="tooltip" data-placement="top"title="1 Baño">1<i class="fas fa-toilet"></i></span><span id="bedrooms" class="characteristic" data-toggle="tooltip" data-placement="top"title="1 Dormitorio">2<i class="fas fa-bed"></i></span><a href="" id="btncontacto"class="btn btn-danger ml-auto mr-4 mb-4">Contactar</a></div></div></a></div></div></div>');
        });
    } else {
        $('#prop-container').append('<div class="row not-found"><h2>Lo sentimos! No encontramos propiedades compatibles con tu busqueda</h2><div class="not-found-lottie"><script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://assets4.lottiefiles.com/packages/lf20_g8sNgp.json" background="transparent"speed="1" style="width: 200px; height: 200px;" autoplay></lottie-player></div></div>');
    }

}