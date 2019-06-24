@extends('layout')

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/distributor">Distributors</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Manage Distributors</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Distributor
            <small>Manage your distributors</small>
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
                    <a href="/distributor/create" class="btn red">
                        <i class="fa fa-plus"></i> Add Distributor
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-user font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Distributors</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="distributor_list">
                            <thead>
                            <tr class="text-center">
                                <th> Name </th>
                                <th> Email </th>
                                <th> Phone Number </th>
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
                    <h4 class="modal-title">Add Distributor</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/distributor" method="POST">
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Distributor Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="add_distributor_name" name="name" class="form-control"
                                               placeholder="Enter the Distributor Name : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Email
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="add_distributor_email" name="email" class="form-control"
                                               placeholder="Enter the Email : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Phone
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="tel" id="add_distributor_phone_number" name="phone" class="form-control"
                                               placeholder="Enter the Phone Number : "/></div>
                                </div>

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_distributor" class="btn btn-primary">
                                        Add Distributor
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
    <!--END OF ADD BUTTON MODAL-->

    <!-- EDIT MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Distributor</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/distributor" id="edit_form" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Distributor Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="edit_distributor_name" name="name" class="form-control"
                                               placeholder="Enter the Distributor Name : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Email
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="edit_distributor_email" name="email" class="form-control"
                                               placeholder="Enter the Email : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Phone
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="tel" id="edit_distributor_phone_number" name="phone" class="form-control"
                                               placeholder="Enter the Phone Number : "/></div>
                                </div>

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_distributor" class="btn btn-primary">
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
                    <h4 class="modal-title">Delete Distributor</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/distributor/" id="delete_form" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to delete the distributor ?</label>
                                </div>

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="delete_save" type="submit" name="delete_distributor" class="btn btn-primary">
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
    <script src="{{ asset('js/distributors/manage-distributors.js') }}"></script>

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
                    title = "Distributor Added Successfully";
                    message = "The given distributor has been successfully added.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Distributor Updated Successfully";
                    message = "The given distributor has been successfully updated.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Distributor Deleted Successfully";
                    message = "The given distributor has been successfully deleted.";
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
                    title = "Failed To Add Distributor";
                    message = "The given Distributor was failed while adding.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Failed To Update Distributor";
                    message = "The given Distributor was failed while updating.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Failed To Delete Distributor";
                    message = "The given Distributor was failed while deleting.";
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
@endsection
