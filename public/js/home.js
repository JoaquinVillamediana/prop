$('.options').hide();
var aLocalities = localities.map((element) => {
    return element.nombre;
});

$('#location').on("input", () => {
    displayLocalities($('#location'));
});

$(document).on('click', '.option', function() {
    event.preventDefault();
    let locality_id = $(this).data('locality_id');
    selectLocation(locality_id)
});