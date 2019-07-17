$(function() {
    var adminTable = $('#purchase_list');
    adminTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/purchase/get-purchases',
        columns: [
            {data: 'supplier', name: 'supplier'},
            {data: 'vendor', name: 'vendor'},
            {data: 'created_at', name: 'purchases.created_at'},
            {data: 'view', name: 'view'},
        ]
    });

    adminTable.on('click', '.delete', function(e) {
        $id = $(this).attr('id');
        $('#delete_form').attr('action', '/department/'+$id);
    });
})
