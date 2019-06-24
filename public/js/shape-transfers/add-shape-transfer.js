$('#vendors').select2({
    placeholder: "Select a vendor",
    ajax: {
        url: '/vendor/select-list',
        dataType: 'json'
    }
});

var tableCount = 0;
$('#row-1').select2({
    placeholder: "Select a product",
    ajax: {
        url: '/api/product/select-list',
        dataType: 'json'
    }
});

$('#add-item').click(function () {
    addRow();
});


function addRow() {
    tableCount++;
    var row = "<tr> " +
                "<td>" + (tableCount) + "</td>" +
                "<td class=\"col-md-3\"> " +
                    "<select name=\"raw_material[]\" id=\"raw-material-" + tableCount + "\" class=\"form-control product_select\"> " +
                        "<option></option> " +
                    "</select>" +
                "</td> " +
                "<td class=\"col-md-3\"> " +
                    "<select name=\"shape[]\" id=\"row-" + tableCount + "\" class=\"form-control product_select\"> " +
                        "<option></option> " +
                    "</select>" +
                "</td> " +
                "<td> " +
                    "<input type=\"text\" id=\"quantity-" + tableCount + "\" name=\"weight[]\" class=\"form-control\" placeholder=\"Weight : \">" +
                "</td>" +
                "<td> " +
                    "<input type=\"text\" id=\"scrap-" + tableCount + "\" name=\"scrap[]\" class=\"form-control\" placeholder=\"Scrap : \">" +
                "</td>" +
             "</tr>";
    $('#table-body').append(row);
    // Initializing Select 2
    $("#row-" + tableCount).select2({
        placeholder: "Select a shape",
        theme: "default",
        ajax: {
            url: '/shape/select-list',
            dataType: 'json',
            data: function(params) {
                return {
                    term: params.term || '',
                    page: params.page || 1
                }
            },
            cache: true
        }
    });

    $("#raw-material-" + tableCount).select2({
        placeholder: "Select a raw material",
        theme: "default",
        ajax: {
            url: '/raw-material/select-list',
            dataType: 'json',
            data: function(params) {
                return {
                    term: params.term || '',
                    page: params.page || 1
                }
            },
            cache: true
        }
    });
}

// Adding a initial blank row.
addRow();
