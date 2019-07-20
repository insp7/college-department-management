$(function() {
    var path = window.location.pathname;
    var id = path.split("/")[2];
    var gstTable = $('#gst_list');
    gstTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/gst/'+id+'/history.json',
        columns: [
            {data: 'hsn_code', name: 'hsn_code'},
            {data: 'gst_rate', name: 'gst_rate'},
            {data: 'wef', name: 'wef'}
        ]
    });
});
