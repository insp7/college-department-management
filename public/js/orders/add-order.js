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

    $('#row-1').select2({
        placeholder: "Select a product",
        theme: "default",
        width: "100%",
        ajax: {
            url: '/api/product/select-list',
            dataType: 'json'
        }
    });


    $('#retailer').change(function() {
        $id = $('#retailer').val();
        $('#address').val(-1);
        if($id !== -1) {
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
        }
    });



    $('#add-item').click(function () {
        addRow();
    });

    function addRow() {
        tableCount++;
        var row = "<tr> <td>" + (tableCount) + "</td><td class=\"col-md-5\"> <select name=\"product[]\" id=\"row-" + tableCount + "\" class=\"form-control product_select\"> <option></option> </select> </td><td> <input type=\"text\" id=\"quantity-" + tableCount + "\" name=\"quantity[]\" class=\"form-control\" placeholder=\"Quantity: \"> </td></tr>";
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
    }

    // Adding a initial blank row.
    addRow();
});
