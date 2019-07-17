$('#states').select2({
    placeholder: "Select a state",
    ajax: {
        url: '/api/state/select-list',
        dataType: 'json'
    }
});
$('#cities').select2({
    placeholder: "Select a city",
    ajax: {
        url: '/api/city/select-list',
        dataType: 'json'
    }
});
