function ajaxRequest(type, url, params, callBack) {

    jQuery.support.cors = true;
    
    if(type == "GET") {
        params = $.param(params);
    } else {
        params = JSON.stringify(params);
    }

    //console.log(params);
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