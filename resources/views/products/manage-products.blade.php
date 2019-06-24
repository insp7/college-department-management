@extends('layout')
<!-- TODO : REMOVE EDIT FROM MANAGE PRODUCT PAGE AND DELETE EDIT PRODUCT PAGE -->

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
                <span>Manage Products</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Products
            <small>Manage your products</small>
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
                    <a href="/product/create" class="btn red">
                        <i class="fa fa-plus"></i> Add Product
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
                            <span class="caption-subject font-red sbold uppercase">Products</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="product_list">
                            <thead>
                            <tr class="text-center">
                                <th> Category</th>
                                <th> Subcategory</th>
                                <th> Weight</th>
                                <th> Size</th>
                                <th> Price </th>
                                <th> Type </th>
                                <th> Product Count </th>
                                <th> Edit </th>
                                <th> Delete</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DELETE MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Product</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/product" id="delete_form" method="POST">
                            @method("DELETE")
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to delete the product ?</label>
                                </div>
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

<!-- TODO : Make edit products page work. -->
@endsection

@section ('custom-script')
    <!------------------------------------------------------------------------------------>
    <!--                          DATA-TABLES SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    <script>


        var productTable = $('#product_list');
        productTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/product/get-products',
            columns: [
                {data: 'category', name: 'categories.name'},
                {data: 'subcategory', name: 'sub_categories.name'},
                {data: 'weight', name: 'weights.name'},
                {data: 'size', name: 'sizes.name'},
                {data: 'price', name: 'price'},
                {data: 'type', name: 'type'},
                {data: 'product_count', name: 'product_count'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });

        productTable.on('click', '.delete', function (e) {
            $id = $(this).attr('id');
            $('#delete_product_id').val($id);
            $("#delete_form").attr("action", "/product/" + $id);
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
                    title = "Product Added Successfully";
                    message = "The given product has been successfully added.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Product Updated Successfully";
                    message = "The given product has been successfully updated.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Product Deleted Successfully";
                    message = "The given product has been successfully deleted.";
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
                    title = "Failed To Add Product";
                    message = "The given Product was failed while adding.";
                </script>
                @break

                @case('update')
                <script>
                    title = "Failed To Update Product";
                    message = "The given Product was failed while updating.";
                </script>
                @break

                @case('destroy')
                <script>
                    title = "Failed To Delete Product";
                    message = "The given Product was failed while deleting.";
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
