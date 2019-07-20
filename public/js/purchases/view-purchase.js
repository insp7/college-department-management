$('#suppliers').select2({
    placeholder: "Select a supplier",
    ajax: {
        url: '/supplier/select-list',
        dataType: 'json'
    }
});
$('#vendors').select2({
    placeholder: "Select a vendor",
    ajax: {
        url: '/vendor/select-list',
        dataType: 'json'
    }
});
