$(function() {
    /**
     * Select2 Section
     */
    $('#state').select2({
        placeholder: "Select a state",
        theme: "default",
        ajax: {
            url: "/miscellaneous/state/select-list",
            dataType: "json",
        }
    });
});
