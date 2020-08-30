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

    let local = localities.find((element) => {
        if (element.id == id) {
            return true;
        }
    });

    document.getElementById("location").value = local.nombre;
    document.getElementById("locality").value = id;
    $('.options').hide();
}




var formatNumber = {
    separator: ".", // separador para los miles
    sepDecimal: ',', // separador para los decimales
    formatear: function(num) {
        num += '';
        var splitStr = num.split('.');
        var splitLeft = splitStr[0];
        var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
        var regx = /(\d+)(\d{3})/;
        while (regx.test(splitLeft)) {
            splitLeft = splitLeft.replace(regx, '$1' + this.separator + '$2');
        }
        return this.simbol + splitLeft + splitRight;
    },
    new: function(num, simbol) {
        this.simbol = simbol || '';
        return this.formatear(num);
    }
}