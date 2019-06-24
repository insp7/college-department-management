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
                <span>Manage Categories</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Category
            <small>Manage your category</small>
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
                        <i class="fa fa-plus"></i> Add Category
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
                            <span class="caption-subject font-red sbold uppercase">Categories</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="category_list">
                            <thead>
                            <tr class="text-center">
                                <th> Category Name </th>
                                <th> HSN CODE </th>
                                <th> Image </th>
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
                    <h4 class="modal-title">Add Category</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/product/category" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="form-group clearfix">
                                    <div class="col-md-9">
                                        <input type="hidden" id="add_category_id" name="category_id"
                                               class="form-control" placeholder="Category ID"/>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Category Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="name" name="category_name" class="form-control"
                                               placeholder="Enter the category name : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">HSN Code
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="hsn_code" name="hsn_code" class="form-control"
                                               placeholder="Enter the HSN Code : "/></div>
                                </div>

                                <div class="form-group clearfix">
                                    <label for="image" class="control-label col-md-3">Category Image </label>
                                    <input type="file" id="image" name="category_image" accept="image/x-png,image/gif,image/jpeg" />
                                </div>

                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_category" class="btn btn-primary">
                                        Add
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
                    <h4 class="modal-title">Edit Category</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/product/category/" id="edit_form" method="POST" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="form-group clearfix">
                                    <div class="col-md-9">
                                        <input type="hidden" id="edit_category_id" name="id"
                                               class="form-control" placeholder="Category ID"/>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">Category Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="category_name" name="category_name" class="form-control"
                                               placeholder="Enter the category name : "/></div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="control-label col-md-3">HSN Code
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" id="edit_hsn_code" name="hsn_code" class="form-control"
                                               placeholder="Enter the HSN Code : "/></div>
                                </div>

                                <div class="form-group clearfix">
                                    <label for="image" class="control-label col-md-3">Image : </label>
                                    <div class="col-md-3"><img src="" class="img-responsive" alt="Category Image" id="edit_category_image"></div>
                                    <input type="file" id="image" name="category_image" accept="image/x-png,image/gif,image/jpeg" />
                                </div>


                                <!-- END OF MODAL BODY -->

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_category" class="btn btn-primary">
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
                    <h4 class="modal-title">Delete Category</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/product/category/" id="delete_form" method="POST">
                            @method("DELETE")
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to delete the category ?</label>
                                </div>
                                <input type="number" name="user_id" value="{{Auth::id()}}" class="invisible"/>

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
        var categoryTable = $('#category_list');
        categoryTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/product/category/get-categories',
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
            columns: [
                {data: 'name', name: 'name'},
                {data: 'hsn_code', name: 'hsn_code'},
                {data: 'image', name: 'image'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });
        categoryTable.on('click', '.edit', function (e) {
            $id = $(this).attr('id');
            $("#edit_category_id").val($id);
            //fetching all other values from database using ajax and loading them onto their respective edit fields!
            //alert($id); to print for checking
            $.ajax({
                url:"/api/product/category/" + $id,
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $("#edit_category_id").val($id);
                    $("#category_name").val(data.name);
                    $("#edit_hsn_code").val(data.hsn_code);
                    $("#edit_category_image").attr('src', '<?php echo \App\Constants\CommonConstants::SERVER_DOMAIN ?>' + data.image);
                    $('#edit_form').attr('action', '/product/category/' + $id);
                    $("#editModal").modal('show');
                },
            });
        });

        categoryTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $('#delete_category_id').val($id);
            $('#delete_form').attr('action', '/product/category/' + $id);
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
                        title = "Category Added Successfully";
                        message = "The given category has been successfully added.";
                    </script>
                    @break

                @case('update')
                    <script>
                        title = "Category Updated Successfully";
                        message = "The given category has been successfully updated.";
                    </script>
                    @break

                @case('destroy')
                    <script>
                        title = "Category Deleted Successfully";
                        message = "The given category has been successfully deleted.";
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
                    message = "The given category was failed while adding.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Failed To Update Category";
                    message = "The given category was failed while updating.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Failed To Delete Category";
                    message = "The given category was failed while deleting.";
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
