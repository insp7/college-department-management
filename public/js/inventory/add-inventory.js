$(function() {
    $('#product').select2({
        placeholder: "Select a product",
        theme: "default",
        ajax: {
            url: '/api/product/select-list',
            dataType: 'json'
        }
    });

    $('#warehouse').select2({
        placeholder: "Select a warehouse",
        theme: "default",
        ajax: {
            url: '/api/warehouse/select-list',
            dataType: 'json'
        }
    });
});
