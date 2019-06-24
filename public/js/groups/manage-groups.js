$(function() {
    var groupTable = $('#group_list');
    groupTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/groups/get-groups',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'promo_code', name: 'promo_code'},
            {data: 'commission_mode', name: 'commission_mode'},
            {data: 'discount_mode', name: 'discount_mode'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ]
    });

    groupTable.on('click', '.delete', function (e) {
        $id = $(this).attr('id');
        $('#delete_group_id').val($id);
        $('#delete_form').attr('action', '/groups/' + $id);
    })
});
