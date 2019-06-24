$(function () {
    $('#departments').select2({
        placeholder: "Select a department",
        theme: "default",
        ajax: {
            url: '/department/select-list',
            dataType: 'json'
        }
    });
});
