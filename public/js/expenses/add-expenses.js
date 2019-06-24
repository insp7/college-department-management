$('#states').select2({
    placeholder: "Select a expense head",
    ajax: {
        url: '/expense-head/select-list',
        dataType: 'json'
    }
});
