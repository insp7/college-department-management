@extends('layout')

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Products</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Manage Warehouse</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Warehouse
            <small>Manage your warehouses</small>
        </h3>
        <!-- END PAGE TITLE-->

        <!-- ALERTS SECTION -->
        <!-- ERRORS SECTION -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- END OF ERRORS SECTION -->
        <!-- END OF ALERT SECTION -->


        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <a href="/warehouse/create" class="btn red">
                        <i class="fa fa-plus"></i> Add Warehouse
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Warehouse</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="warehouse_list">
                            <thead>
                            <tr class="text-center">
                                <th> Warehouse Name </th>
                                <th> Location </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!------------------------------------------------------------------------------------>
    <!--                                MODAL SECTION                                   -->
    <!------------------------------------------------------------------------------------>

    <!-- DELETE MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Warehouse</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/warehouse" id="delete_form" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to delete the warehouse ?</label>
                                </div>
                                <!-- THE USER ID -->

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_category" class="btn btn-primary">
                                        Delete
                                    </button>
                                </div>
                                <!-- END OF MODAL FOOTER -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END OF EDIT BUTTON MODAL-->


@endsection

@section ('custom-script')
    <!------------------------------------------------------------------------------------>
    <!--                          DATA-TABLES SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    <script>
        var warehouseTable = $('#warehouse_list');
        warehouseTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/warehouse/get-warehouses',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'department', name: 'departments.name'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });
        warehouseTable.on('click', '.edit', function (e) {
            $id = $(this).attr('id');
            $("#edit_warehouse_id").val($id);
            //fetching all other values from database using ajax and loading them onto their respective edit fields!
            //alert($id); to print for checking
            $.ajax({
                url:"/warehouse/" + $id,
                method: "GET",
                dataType: "json",
                success: function(data){
                    $("#edit_warehouse_id").val($id);
                    $("#edit_name").val(data.name);
                    $('#edit_form').attr('action', '/warehouse/' + $id);
                    $("#editModal").modal('show');
                },
            });
        });

        warehouseTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $('#delete_warehouse_id').val($id);
            $('#delete_form').attr('action', '/warehouse/' + $id);
        })
    </script>


    @if(session()->has('success_store') ||
        session()->has('error_store') ||
        session()->has('success_update') ||
        session()->has('error_update') ||
        session()->has('success_destroy') ||
        session()->has('error_destroy'))
        @if(session()->has('success_store'))
            <script>
                var title = "Warehouse added successfully";
                var message = "{{ session('success_store') }}";
                var type = "success";
                {{ Session::forget('success_store') }}
            </script>
        @elseif(session()->has('error_store'))
            <script>
                var title = "Warehouse could not be added";
                var message = "{{ session('error_store') }}";
                var type = "error";
                {{ Session::forget('error_store') }}
            </script>
        @elseif(session()->has('success_update'))
            <script>
                var title = "Warehouse updated successfully";
                var message = "{{ session('success_update') }}";
                var type = "success";
                {{ Session::forget('success_update') }}
            </script>
        @elseif(session()->has('error_update'))
            <script>
                var title = "Failed to update warehouse";
                var message = "{{ session('error_update') }}";
                var type = "error";
                {{ Session::forget('error_update') }}
            </script>
        @elseif(session()->has('success_destroy'))
            <script>
                var title = "Successfully destroyed successfully";
                var message = "{{ session('success_destroy') }}";
                var type = "success";
                {{ Session::forget('success_destroy') }}
            </script>
        @elseif(session()->has('error_destroy'))
            <script>
                var title = "Failed to delete warehouse";
                var message = "{{ session('error_destroy') }}";
                var type = "error";
                {{ Session::forget('error_destroy') }}
            </script>
        @endif


        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr[type](message, title);
        </script>
    @endif

    <!-- END OF TOASTR SECTION -->
@endsection
