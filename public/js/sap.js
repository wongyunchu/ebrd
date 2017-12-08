function loadSap(rfc, importSap) {
    var deferred = $.Deferred();
    input= {
        SERVER :'STC',
        FID :rfc,
        //import:'{"I_PERNR":"2950001"}'
        import:JSON.stringify(importSap) //'{"I_PERNR":"2950001"}'
    }


    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: env.url,
        //data: jQuery.param(this.input)
        data: input
    }).done(function (data) {
        return deferred.resolve(data);
    }).fail(function () {
        alert("Posting failed.");
        return deferred.reject();
    });
    return deferred.promise();
}