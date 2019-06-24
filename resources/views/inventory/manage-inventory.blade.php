@extends('layout')

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/inventory">Inventory</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Manage Inventories</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Inventory
            <small>Manage your inventory</small>
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
                    <a href="/inventory/create" class="btn red">
                        <i class="fa fa-plus"></i> Add Inventory
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
                            <span class="caption-subject font-red sbold uppercase">Inventories</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="inventory_list">
                            <thead>
                            <tr class="text-center">
                                <th> Category</th>
                                <th> SubCategory</th>
                                <th> Size</th>
                                <th> Weight</th>
                                <th> Quantity</th>
                                <th> Warehouse</th>
                                <th> Add Quantity</th>
                                <th> Move</th>
                                <th> Delete</th>
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

    <!-- UPDATE QUANTITY MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="updateQuantityModal">
        <div class="modal-dialog" role="document">
            <form action="/inventory/" id="update_quantity_form" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Inventory Quantity</h4>
                    </div>

                    <div class="modal-body">

                            <!-- START OF MODAL BODY -->
                            <div class="form-group">
                                <label for="quantity">Quantity to add : </label>
                                <input name="quantity" type="number"
                                       placeholder="Enter the quantity you want to add" class="form-control">
                            </div>
                            <!-- END OF MODAL BODY -->

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button id="edit_save" type="submit" name="edit_inventory" class="btn btn-primary">
                            Update Quantity
                        </button>
                    </div>
                    <!-- END OF MODAL FOOTER -->
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END OF UPDATE QUANTITY BUTTON MODAL-->

    <!-- DELETE MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Inventory</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/inventory" id="delete_form" method="POST">
                            @method("DELETE")
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to delete the inventory ?</label>
                                </div>
                                <input type="number" name="user_id" value="{{Auth::id()}}" class="invisible"/>

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_inventory" class="btn btn-primary">
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
    <script src="{{ asset('js/inventory/manage-inventory.js') }}"></script>


    <!------------------------------------------------------------------------------------>
    <!--                            TOASTER'S SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    @if(session()->has('success') || session()->has('error') || session()->has('error_update_quantity'))
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

                @case('update')
                <script>
                    title = "Inventory Updated Successfully";
                    message = "The given inventory has been successfully updated.";
                </script>
                @break

                @case('update_quantity')
                <script>
                    title = "Given quantity was added.";
                    message = "The Given quantity was added successfully";
                </script>
                @break

                @case('move')
                <script>
                    title = "Inventory moved successfully";
                    message = "The given inventory has been successfully moved.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Inventory Deleted Successfully";
                    message = "The given inventory has been successfully deleted.";
                </script>
                @break
            @endswitch
            {{ Session::forget('success') }}
        @endif

        @if(session()->has('error'))
            <script>
                type = "error";
            </script>
            @switch(session('error'))

                @case('update')
                <script>
                    title = "Failed To Update Inventory";
                    message = "The given inventory was failed while updating.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Failed To Delete Inventory";
                    message = "The given inventory was failed while deleting.";
                </script>
                @break
            @endswitch
            {{ Session::forget('error') }}
        @endif

        @if(session()->has('error_update_quantity'))
            <script>
                type = "error";
                title = "Failed to add quantity";
                message = "{{session('error_update_quantity')}}";
            </script>
            {{ Session::forget('error_update_quantity') }}
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
