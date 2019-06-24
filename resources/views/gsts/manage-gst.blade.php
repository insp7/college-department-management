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
                <span>GST</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Manage GST</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> GST
            <small>Manage GST</small>
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
                    <a class="btn red" href="/gst/create">
                        <i class="fa fa-plus"></i> Add GST
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-red sbold uppercase">GST</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="gst_list">
                            <thead>
                            <tr class="text-center">
                                <th> HSN Code </th>
                                <th> GST Rate</th>
                                <th> With Effect From</th>
                                <th> Update GST Rate </th>
                                <th> History </th>
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
                    <h4 class="modal-title">Delete GST</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/gst/" id="delete_form" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to delete the GST ?</label>
                                </div>

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="delete_save" type="submit" name="delete_gst" class="btn btn-primary">
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
        var gstTable = $('#gst_list');
        gstTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/gst/get-gsts',
            columns: [
                {data: 'hsn_code', name: 'hsn_code'},
                {data: 'gst_rate', name: 'gst_rate'},
                {data: 'wef', name: 'wef'},
                {data: 'edit', name: 'edit'},
                {data: 'history', name: 'history'},
                {data: 'delete', name: 'delete'}
            ]
        });
        gstTable.on('click', '.edit', function (e) {
            $id = $(this).attr('id');
            $("#edit_gst_id").val($id);
            //fetching all other values from database using ajax and loading them onto their respective edit fields!
            //alert($id); to print for checking
            $.ajax({
                url:"/gst/" + $id,
                method: "GET",
                dataType: "json",
                success: function(data){
                    $("#edit_hsn_code").val(data.hsn_code);
                    $("#edit_gst_rate").val(data.gst_rate);
                    $("#edit_wef").val(data.wef);
                    $('#edit_form').attr('action', '/gst');
                    $("#editModal").modal('show');
                },
            });
        });

        gstTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $('#delete_gst_id').val($id);
            $('#delete_form').attr('action', '/gst/'+$id);
        });

        gstTable.on('click', '.history', function(e) {
            $id = $(this).attr('id');
            window.location = '/gst/' + $id + "/history";
        });
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
                    title = "GST Added Successfully";
                    message = "The given GST has been successfully added.";
                </script>
                @break

                @case('update')
                <script>
                    title = "GST Updated Successfully";
                    message = "The given GST has been successfully updated.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "GST Deleted Successfully";
                    message = "The given gst has been successfully deleted.";
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
                    title = "Failed To Add GST ";
                    message = "The given GST was failed while adding.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Failed To Update GST";
                    message = "The given GST was failed while updating.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Failed To Delete GST";
                    message = "The given GST was failed while deleting.";
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
            }
            toastr[type](message, title);
        </script>
    @endif
    <!-- END OF TOASTR SECTION -->
@endsection
