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
            {data: 'order_no', name: 'order_no'},
            {data: 'invoice_no', name: 'invoice_no'},
            {data: 'amount', name: 'amount'},
            {data: 'gst', name: 'gst'},
            {data: 'total', name: 'total'},
            {data: 'view', name: 'view'},
        ]
    });

    adminTable.on('click', '.delete', function(e) {
        $id = $(this).attr('id');
        $('#delete_form').attr('action', '/department/'+$id);
    });
})
