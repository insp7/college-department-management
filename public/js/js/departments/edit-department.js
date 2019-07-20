$('#state').select2({
    placeholder: "Select a state",
    ajax: {
        url: '/api/state/select-list',
        dataType: 'json'
    }
});

function loadCities() {
    $id = $('#state').val();
    $('#city').select2({
        placeholder: "Select a city",
        theme: "default",
        ajax: {
            url: '/api/area/select-list/' + $id,
            dataType: 'json'
        }
    });
}

$('#state').change(function() {
    loadCities();
});
