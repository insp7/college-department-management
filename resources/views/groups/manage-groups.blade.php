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
                <a href="/groups">Groups</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Manage Groups</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Groups
            <small>Manage your groups</small>
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
                    <a class="btn red" href="/groups/create">
                        <i class="fa fa-plus"></i> Add Group
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
                            <span class="caption-subject font-red sbold uppercase">Group</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="group_list">
                            <thead>
                            <tr class="text-center">
                                <th> Group Name</th>
                                <th> Promo Code </th>
                                <th> Commission Mode </th>
                                <th> Discount Mode </th>
                                <th> Edit</th>
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

    <!-- ADD MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Group</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/groups" method="POST">
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Group Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" name="group_name" class="form-control"
                                               placeholder="Enter the group name : "/></div>
                                </div>
                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_group" class="btn btn-primary">Add
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


    <!-- DELETE MODAL -->
    <div class="modal fade in" tabindex="-1" role="dialog" id="deleteModal">
        <form action="/groups" id="delete_form" method="POST">
            @method('DELETE')
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete Group</h4>
                    </div>

                    <div class="modal-body">
                        <div class="text-danger">Are you sure you want to delete the group ?</div>
                        <div class="bold">If you delete this group then all the retailers under this group will also be
                            deleted.
                        </div>
                        <br>
                        <div class="text-info">If don't want to delete the retailers but delete the group.</div>
                        <ol class="text-regular">
                            <li>First change the group of all the retailers under this group.</li>
                            <li>Make sure you have changed the group of all the retailers</li>
                            <li>Now you can delete the group.</li>
                        </ol>

                        <!-- THE USER ID -->

                    </div>
                    <!-- END OF MODAL BODY -->

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>


                        <button id="edit_save" type="submit" name="edit_category" class="btn green">
                            Delete
                        </button>

                    </div>
                    <!-- END OF MODAL FOOTER -->


                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </form>
    </div>
    <!--END OF EDIT BUTTON MODAL-->


@endsection

@section ('custom-script')
    <script src="{{ asset("js/groups/manage-groups.js") }}"></script>


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
                    title = "Group Added Successfully";
                    message = "The given group has been successfully added.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Group Updated Successfully";
                    message = "The given group has been successfully updated.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Group Deleted Successfully";
                    message = "The given group has been successfully deleted.";
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
                    message = "The given group was failed while adding.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Failed To Update Category";
                    message = "The given group was failed while updating.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Failed To Delete Category";
                    message = "The given group was failed while deleting.";
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
