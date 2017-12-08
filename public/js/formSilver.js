function getRowVal(event){
    rowData = $(event.currentTarget).closest('tr').data('val');
    return rowData;
}

function submitRow(val){
    p = JSON.stringify(val);
    $('#inputData').val(p);
    $('#formToCreate').submit();
}