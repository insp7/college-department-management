$('#state').select2({
    placeholder: "Select a state",
    ajax: {
        url: '/api/state/select-list',
        dataType: 'json'
    }
});
$('#city').select2({
    placeholder: "Select a city",
    ajax: {
        url: '/api/city/select-list',
        dataType: 'json'
    }
});
