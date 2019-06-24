$(function() {
    var adminTable = $('#shape_list');
    adminTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/shape/get-shapes',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ]
    });

    adminTable.on('click', '.delete', function(e) {
        $id = $(this).attr('id');
        $('#delete_form').attr('action', '/shape/'+$id);
    });
})
