$('#state').select2({
    placeholder: "Select a state",
    ajax: {
        url: '/api/state/select-list',
        dataType: 'json'
    }
});
$('#area').select2({
    placeholder: "Select a area",
    ajax: {
        url: '/api/area/select-list',
        dataType: 'json'
    }
});
