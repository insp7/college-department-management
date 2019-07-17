$(function() {
    var adminTable = $('#department_list');
    adminTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/department/get-departments',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'company', name: 'company'},
            {data: 'city', name: 'cities.name'},
            {data: 'gst_no', name: 'gst_no'},
            {data: 'address', name: 'address'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ]
    });

    adminTable.on('click', '.delete', function(e) {
        $id = $(this).attr('id');
        $('#delete_form').attr('action', '/department/'+$id);
    });
});
