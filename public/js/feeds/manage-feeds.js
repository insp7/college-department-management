$(function() {
    var feedsTable = $('#feeds');
    feedsTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/feed/get-feeds',
        columns: [
            {data: 'description', name: 'description'},
            {data: 'event_date', name: 'event_date'},
            // {data:'image',name:'image'},
            {data: 'view', name: 'view'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ]
    });

    feedsTable.on('click', '.delete', function(e) {
        $id = $(this).attr('id');
        $('#delete_supplier_id').val($id);
        $('#delete_form').attr('action', '/feed/'+$id);
    })

;})
