function loadSap() {
    var deferred = $.Deferred();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: env.url,
        //data: jQuery.param(this.input)
        data: this.input
    }).done(function (data) {
        vv.output.data = data;
        vv.output.E_DTEXT = data.E_DTEXT;
        vv.output.otab = data.OTAB;
        return deferred.resolve(data);
    }).fail(function () {
        alert("Posting failed.");
        return deferred.reject();
    });
}