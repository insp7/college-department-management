$(function() {
    var adminTable = $('#raw_material_list');
    adminTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/raw-material/get-raw-materials',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'hsn_code', name: 'hsn_code'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ]
    });

    adminTable.on('click', '.delete', function(e) {
        $id = $(this).attr('id');
        $('#delete_form').attr('action', '/raw-material/'+$id);
    });
})
