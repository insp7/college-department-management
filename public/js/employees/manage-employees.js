$(function() {
    var employeeTable = $('#employee_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'employee/get-all',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'edit', name: 'edit'},
            {data: 'delete', name: 'delete'}
        ]
    });

    employeeTable.on('click', '.edit', function (e) {
        $id = $(this).attr('id');
        $("#edit_employee_id").val($id);
        //fetching all other values from database using ajax and loading them onto their respective edit fields!
        //alert($id); to print for checking
        $.ajax({
            url:"/employee/" + $id,
            method: "GET",
            dataType: "json",
            success: function(data){
                $("#edit_employee_name").val(data.name);
                $("#edit_employee_email").val(data.email);
                $("#edit_employee_phone_number").val(data.phone_number);
                $('#edit_form').attr('action', '/employee/'+$id);
                $("#editModal").modal('show');
            },
        });
    });

    employeeTable.on('click', '.delete', function(e) {
        $id = $(this).attr('id');
        $('#delete_employee_id').val($id);
        $('#delete_form').attr('action', '/employee/'+$id);
    })
});
