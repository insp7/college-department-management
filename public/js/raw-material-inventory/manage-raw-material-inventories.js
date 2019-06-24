$(function() {
    var adminTable = $('#raw_material_inventory_list');
    adminTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/raw-material-inventory/get-inventory',
        columns: [
            {data: 'raw_material', name: 'raw_material'},
            {data: 'vendor', name: 'vendors.name'},
            {data: 'weight', name: 'weight'},
        ]
    });
})
