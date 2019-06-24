$(function() {
    var inventoryTable = $('#inventory_list');
    inventoryTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/inventory/get-inventories',
        columns: [
            {data: 'category', name: 'category'},
            {data: 'subcategory', name: 'subcategory'},
            {data: 'size', name: 'size'},
            {data: 'weight', name: 'weight'},
            {data: 'quantity', name: 'quantity'},
            {data: 'warehouse', name: 'warehouse'},
            {data: 'update_quantity', name: 'update_quantity'},
            {data: 'move', name: 'move'},
            {data: 'delete', name: 'delete'},
        ]
    });
    inventoryTable.on('click', '.update_quantity', function (e) {
        $id = $(this).attr('id');
        $('#update_quantity_form').attr("action", "/inventory/" + $id + "/update/quantity");
    });

    inventoryTable.on('click', '.delete', function (e) {
        $id = $(this).attr('id');
        $('#delete_inventory_id').val($id);
        $('#delete_form').attr('action', '/inventory/' + $id);
    })
});
