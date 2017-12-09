/* 조회시
* */
function loadSap(rfc, importSap) {
    if(importSap === undefined) {
        alert('paramemter 부족[]');
        return;
    }
    var deferred = $.Deferred();
    input= {
        SERVER :'STC',
        FID :rfc,
        import:JSON.stringify(importSap), //'{"I_PERNR":"2950001"}',
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

/* 삭제시
* */
function saveSap(rfc, inputs) {
    if(inputs === undefined) {
        alert('paramemter 부족[]');
        return;
    }
    var _importSap = _.clone(inputs);
    delete(_importSap.tables);
    var deferred = $.Deferred();
    input= {
        SERVER :'STC',
        FID :rfc,
        import:JSON.stringify(_importSap), //'{"I_PERNR":"2950001"}',
        tables:JSON.stringify(inputs.tables)
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