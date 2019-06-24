$(function() {
    var adminTable = $('#admin_list');
    adminTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/get-admins',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ]
    });
    adminTable.on('click', '.edit', function (e) {
        $id = $(this).attr('id');
        $("#edit_category_id").val($id);
        //fetching all other values from database using ajax and loading them onto their respective edit fields!
        //alert($id); to print for checking
        $.ajax({
            url:"/admin/" + $id,
            method: "GET",
            dataType: "json",
            success: function(data){
                $("#edit_admin_name").val(data.name);
                $("#edit_admin_email").val(data.email);
                $("#edit_admin_phone_number").val(data.phone_number);
                $('#edit_form').attr('action', '/admin/'+$id);
                $("#editModal").modal('show');
            },
        });
    });

    adminTable.on('click', '.delete', function(e) {
        $id = $(this).attr('id');
        $('#delete_admin_id').val($id);
        $('#delete_form').attr('action', '/admin/'+$id);
    });
})
