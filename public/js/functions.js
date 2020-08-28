function displayLocalities(input) {
    $('.options').html('');
    if (input.val() != '') {
        $('.options').show();
        var matchs = localities.filter((element) => {
            let txt = input.val();
            txt = txt.toUpperCase();
            if (element.nombre.includes(txt)) {
                var options = $(".options *");

                if (options.length < 15) {

                    $('.options').append('<a href="" data-locality_id="' + element.id + '" class="option">' + element.nombre + ', ' + element.municipio_nombre + ', ' + element.provincia_nombre + '</a>');
                }
            };
        });
    } else {
        $('.options').hide();
    }
}




function selectLocation(id) {
    event.preventDefault();
    let local = localities.find((element) => {
        if (element.id == id) {
            return true;
        }
    });

    document.getElementById("location").value = local.nombre;
    document.getElementById("locality").value = id;
    $('.options').hide();
}