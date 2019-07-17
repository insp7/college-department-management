$(function() {
    $('#retailer').select2({
        placeholder: "Select the retailers",
        theme: "default",
        ajax: {
            url: '/api/retailer/select-list',
            dataType: 'json'
        }
    });
});
