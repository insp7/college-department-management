$(function() {
    function initTables(id, url) {
        var placedTable = $(id);
        placedTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: url,
            dom: 'Bfrtip',
            "scrollX": true,
            buttons: [{
                extend: 'print',
                autoPrint: true,
                title: '',
                repeatingHead: {
                    logo: 'https://www.google.co.in/logos/doodles/2018/world-cup-2018-day-22-5384495837478912-s.png',
                    logoPosition: 'right',
                    logoStyle: '',
                    title: '<h3>Sample Heading</h3>'
                }
            }, 'excel'],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'created_at', name: 'created_at'},
                {data: 'retailer', name: 'retailer'},
                {data: 'gst_no', name: 'gst_no'},
                {data: 'pieces', name: 'pieces'},
                {data: 'weight', name: 'weight'},
                {data: 'taxable_amount', name: 'taxable_amount'},
                {data: 'cgst', name: 'cgst'},
                {data: 'sgst', name: 'sgst'},
                {data: 'igst', name: 'igst'},
                {data: 'tcs', name: 'tcs'},
                {data: 'tax_amount', name: 'tax_amount'},
                {data: 'round_off', name: 'round_off'},
                {data: 'net_amount', name: 'net_amount'},
                {data: 'tax_name', name: 'tax_name'},
            ]
        });
    }

    initTables('#sales_list', '/invoice/get-sales-register');
})
