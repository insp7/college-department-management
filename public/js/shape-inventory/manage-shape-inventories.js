$(function() {
    var adminTable = $('#shape_inventory_list');
    adminTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/shape-inventory/get-inventory',
        columns: [
            {data: 'shape', name: 'shape'},
            {data: 'weight', name: 'weight'},
        ]
    });
})
