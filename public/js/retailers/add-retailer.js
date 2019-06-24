$(function() {
    // FETCHING ALL THE SELECT2's
    $('#state').select2({
        placeholder: "Select a state",
        theme: 'default',
        ajax: {
            url: '/api/state/select-list',
            dataType: 'json'
        }
    });
    $('#city').select2({
        placeholder: "Select a area",
        theme: 'default',
        ajax: {
            url: '/api/area/select-list',
            dataType: 'json'
        }
    });
    $('#distributor').select2({
        placeholder: "Select a distributor",
        theme: 'default',
        ajax: {
            url: '/api/distributor/select-list',
            dataType: 'json'
        }
    });
    $('#subdistributor').select2({
        placeholder: "Select a sub-distributor",
        theme: 'default',
        ajax: {
            url: '/api/sub-distributor/select-list',
            dataType: 'json'
        }
    });
    $('#group').select2({
        placeholder: "Select a group",
        theme: 'default',
        ajax: {
            url: '/api/groups/select-list',
            dataType: 'json'
        }
    });



})
