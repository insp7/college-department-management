$(function() {
    var distributorTable = $('#distributor_list');
    distributorTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/distributor/get-distributors',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ]
    });
    distributorTable.on('click', '.edit', function (e) {
        $id = $(this).attr('id');
        $("#edit_category_id").val($id);
        //fetching all other values from database using ajax and loading them onto their respective edit fields!
        //alert($id); to print for checking
        $.ajax({
            url:"/distributor/" + $id,
            method: "GET",
            dataType: "json",
            success: function(data){
                $("#edit_distributor_name").val(data.name);
                $("#edit_distributor_email").val(data.email);
                $("#edit_distributor_phone_number").val(data.phone_number);
                $('#edit_form').attr('action', '/distributor/'+$id);
                $("#editModal").modal('show');
            },
        });
    });

    distributorTable.on('click', '.delete', function(e) {
        $id = $(this).attr('id');
        $('#delete_distributor_id').val($id);
        $('#delete_form').attr('action', '/distributor/'+$id);
    })
});
