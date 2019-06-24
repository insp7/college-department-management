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
                <span>Manage Size</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Size
            <small>Manage your sizes</small>
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
                    <button class="btn red" data-toggle='modal' data-target='#addModal'>
                        <i class="fa fa-plus"></i> Add Size
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Size</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="size_list">
                            <thead>
                            <tr class="text-center">
                                <th> Size Name </th>
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

    <!-- ADD MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Size</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/product/size" method="POST">
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Size Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" name="size_name" class="form-control"
                                               placeholder="Enter the size name : "/></div>
                                </div>

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_size" class="btn btn-primary">Add</button>
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
    <!--END OF ADD BUTTON MODAL-->

    <!-- EDIT MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Size</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/product/size" id="edit_form" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-4">Size Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="size_name" name="size_name" class="form-control"
                                               placeholder="Enter the size name : "/></div>
                                </div>
                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_size" class="btn btn-primary">
                                        Save changes
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

    <!-- DELETE MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Size</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/product/size" id="delete_form" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to delete the size ?</label>
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
        var sizeTable = $('#size_list');
        sizeTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/product/size/get-sizes',
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });
        sizeTable.on('click', '.edit', function (e) {
            $id = $(this).attr('id');
            $("#edit_size_id").val($id);
            //fetching all other values from database using ajax and loading them onto their respective edit fields!
            //alert($id); to print for checking
            $.ajax({
                url:"/api/product/size/" + $id,
                method: "GET",
                dataType: "json",
                success: function(data){
                    $("#edit_size_id").val($id);
                    $("#size_name").val(data.name);
                    $('#edit_form').attr('action', '/product/size/' + $id);
                    $("#editModal").modal('show');
                },
            });
        });

        sizeTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $('#delete_size_id').val($id);
            $('#delete_form').attr('action', '/product/size/' + $id);
        })
    </script>


    <!------------------------------------------------------------------------------------>
    <!--                            TOASTER'S SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    @if(session()->has('success') || session()->has('error'))
        <script>
            var title = "";
            var message = "";
            var type = "";
        </script>
        @if(session()->has('success'))
            <script>
                type = "success";
            </script>
            @switch(session('success'))
                @case('store')
                <script>
                    title = "Size Added Successfully";
                    message = "The given size has been successfully added.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Size Updated Successfully";
                    message = "The given size has been successfully updated.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Size Deleted Successfully";
                    message = "The given size has been successfully deleted.";
                </script>
                @break
            @endswitch
            {{ Session::forget('success') }}
        @endif

        @if(session()->has('error'))
            <script>
                type = "danger";
            </script>
            @switch(session('error'))
                @case('store')
                <script>
                    title = "Failed To Add Category";
                    message = "The given size was failed while adding.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Failed To Update Category";
                    message = "The given size was failed while updating.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Failed To Delete Category";
                    message = "The given size was failed while deleting.";
                </script>
                @break
            @endswitch
            {{ Session::forget('error') }}
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
            };
            toastr[type](message, title);
        </script>
    @endif
    <!-- END OF TOASTR SECTION -->
@endsection
