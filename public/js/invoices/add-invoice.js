$(function() {
    var tableCount = 0;
    $('#retailer').select2({
        placeholder: "Select a retailer",
        theme: "default",
        ajax: {
            url: '/api/retailer/select-list',
            dataType: 'json'
        }
    });
    $('#row-1').select2({
        placeholder: "Select a product",
        theme: "default",
        ajax: {
            url: '/api/product/select-list',
            dataType: 'json'
        }
    });

    $('#department').select2({
        placeholder: "Select a location",
        theme: "default",
        ajax: {
            url: '/department/select-list',
            dataType: 'json'
        }
    });


    $('#retailer').change(function() {
        $id = $(this).val();
        $('#address').select2({
            placeholder: "Select a address",
            theme: "default",
            ajax: {
                url: "/retailer/" + $id + "/address/all",
                dataType: "json",
                processResults: (data) => {
                    let addresses = data.map((address) => ({
                        id: address.id,
                        text: address.address
                    }));

                    return {
                        results: addresses
                    };
                }
            }
        }).on('select2:open', () =>  {
            return  $("#address > .select2-results:not(:has(a))")
                .append('<a href="#" style="padding: 6px;height: 20px;display: inline-table;">' +
                    'Create new item' +
                    '</a>');
        });

        $('#transport').select2({
            placeholder: "Select the transport",
            theme: "default",
            ajax: {
                url: "/retailer/" + $('#retailer').val() + "/transport/all",
                dataType: "json",
                processResults: (data) => {
                    var result = data.map((data) => {
                        return {
                            id: data,
                            text: data
                        };
                    });
                    return {
                        results: result
                    };
                }
            }
        }).on('select2:open', () => {
            // Storing the object. Since we need to add a on click listener.
            let object = $(".select2-results:not(:has(a))")
                .append('<a  href="javascript:;" id="add-transport" ' +
                    'style="padding: 6px;height: 20px;display: inline-table;" ' +
                    '>' +
                    'Add a new transport' +
                    '</a>');


            $('#add-transport').click(function () {
                let retailerId = $('#retailer').val();

                $('#add-address-form').attr('action', '/retailer/' + retailerId + "/transport");
                $('#addTransport').modal('show');
            });

            return object;
        });
    });


    $('#address').select2({
        placeholder: "Select a address",
        theme: "default",
    }).on('select2:open', () =>  {
        // Storing the object. Since we need to add a on click listener.
        let object = $(".select2-results:not(:has(a))")
            .append('<a  href="javascript:;" id="add-address" ' +
                'style="padding: 6px;height: 20px;display: inline-table;" ' +
                '>' +
                'Add a new shipping address' +
                '</a>');



        $('#add-address').click(function() {
            let retailerId = $('#retailer').val();
            if(retailerId <= 0) {
                alert("Please select a retailer first");
            } else {
                $('#add-address-form').attr('action', '/retailer/' + retailerId + "/address");
                $('#addAddress').modal('show');

                $('#city').select2({
                    placeholder: "Select a city",
                    dropdownParent: $('#addAddress .modal-body .row'),
                    theme: "default",
                    ajax: {
                        url: "/api/area/select-list",
                        dataType: "json"
                    }
                });
            }
        });

        return object;
    });

    $('#add-item').click(function () {
        addRow();
    });

    function addRow() {
        tableCount++;
        var row = "<tr>" +
                        "<td>" + (tableCount) + "</td>" +
                        "<td class=\"col-md-4\"> " +
                            "<select name=\"product[]\" id=\"row-" + tableCount + "\" class=\"form-control product_select\"> " +
                                "<option></option> " +
                            "</select> " +
                        "</td>" +
                        "<td class='col-md-2'>" +
                            "<select name=\"warehouse[]\" id=\"warehouse-" + tableCount + "\" class=\"form-control warehouse_select\"> " +
                                "<option></option> " +
                            "</select> " +
                        "</td>" +
                        "<td> " +
                            "<input type=\"text\" id=\"units-" + tableCount + "\" name=\"units[]\" class=\"form-control\" placeholder=\"Units: \"> " +
                        "</td>" +
                        "<td> " +
                            "<input type=\"text\" id=\"weight-" + tableCount + "\" name=\"weight[]\" class=\"form-control\" placeholder=\"Weight (In Gms): \"> " +
                        "</td>" +
                        "<td> " +
                            "<input type=\"text\" id=\"price-" + tableCount + "\" name=\"price[]\" class=\"form-control\" placeholder=\"Price: \"> " +
                        "</td>" +
                    "</tr>";
        $('#table-body').append(row);
        // Initializing Select 2
        $("#row-" + tableCount).select2({
            placeholder: "Select a product",
            theme: "default",
            ajax: {
                url: '/api/product/select-list',
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
        $('#warehouse-' + tableCount).select2({
            placeholder: "Select a warehouse",
            theme: "default",
            ajax: {
                url: '/api/warehouse/select-list',
                dataType: 'json',
                data: function(params) {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                cache: true
            }
        })
    }

    // Adding a initial blank row.
    addRow();
});
