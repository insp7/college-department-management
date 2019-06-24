@extends('layout')

@section('custom-styles')
    <link rel="stylesheet" href="{{ URL::asset('/css/order/view-in-process-orders.css') }}">
@endsection

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/order">Manage Orders</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>View Order</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> View Order
            <small>View the details of a order or update them.</small>
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
            <div class="form-group col-md-6">
                <label>Retailer : </label>
                <input type="text" disabled class="form-control" value="{{ $retailer }}">
            </div>

            <div class="form-group col-md-6">
                <label>Shipping Address : </label>
                <textarea class="form-control" rows="3" disabled>{{ $address }}</textarea>
            </div>
        </div>

        <!-- ORDER STATUS -->
        <div class="mt-element-step">
            <div class="row step-line">
                <div class="mt-step-desc">
                    <div class="font-dark bold uppercase">Order Status</div>
                </div>

                <div class="col-md-4 mt-step-col first done">
                    <div class="mt-step-number bg-white">
                        <i class="icon-basket"></i>
                    </div>
                    <div class="mt-step-title uppercase font-grey-cascade">
                        Placed
                    </div>
                    <div class="mt-step-content font-grey-cascade">
                        The order has been placed.
                    </div>
                </div>

                <div class="col-md-4 mt-step-col done">
                    <div class="mt-step-number bg-white">
                        <i class="icon-energy"></i>
                    </div>
                    <div class="mt-step-title uppercase font-grey-cascade">
                        In Process
                    </div>
                    <div class="mt-step-content font-grey-cascade">
                        The order is in process.
                    </div>
                </div>

                <div class="col-md-4 mt-step-col last done">
                    <div class="mt-step-number bg-white">
                        <i class="icon-check"></i>
                    </div>
                    <div class="mt-step-title uppercase font-grey-cascade">
                        Completed
                    </div>
                    <div class="mt-step-content font-grey-cascade">
                        Payments have been received and the order is completed
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF ORDER STATUS -->

        <!-- INVOICES -->
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Invoices</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="invoice_list">
                            <thead>
                            <tr class="text-center">
                                <th> Sr No.</th>
                                <th> No Of Products</th>
                                <th> Price </th>
                                <th> Gst </th>
                                <th> Total </th>
                                <th> Status </th>
                                <th> Created At </th>
                                <th> View </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- PRODUCTS -->
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Products</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="product_list">
                            <thead>
                            <tr class="text-center">
                                <th> Category</th>
                                <th> SubCategory</th>
                                <th> Size</th>
                                <th> Weight</th>
                                <th> Quantity</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---- MODAL SECTION ------>
    <!-- CONFIRM UPDATE ORDER MODAL -->
    <div class="modal fade" tabindex="-1" role="dialog" id="updateStateModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Update Order Status</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/order/{{$id}}/dispatch/all" id="delete_form" method="POST">
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to dispatch all the remaining products ?</label>
                                    <br>
                                </div>
                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_category" class="btn btn-primary">
                                        Dispatch all products
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
    @if( session()->has('success_dispatch') || session()->has('error'))
        <script>
            var title = "";
            var message = "";
            var type = "";
        </script>
        @if( session()->has('success_dispatch') )
            <script>
                type = "success";
                title = "Order Products Dispatched";
                message = "{{ session("success_dispatch") }}";
            </script>
            {{ Session::forget('success_dispatch') }}
        @endif

        @if( session()->has('error_dispatch') )
            <script>
                type = "error";
                title = "Failed To dispatch order products";
                message = "{{session('error_dispatch')}}";
            </script>
            {{ Session::forget('error_dispatch') }}
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

    <!------------------------------------------------------------------------------------>
    <!--                          DATA-TABLES SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    <script>
        let invoiceTable = $('#invoice_list');
        invoiceTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/invoice/get-invoices/{{$id}}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'count', name: 'count'},
                {data: 'price', name: 'price'},
                {data: 'gst', name: 'gst'},
                {data: 'total', name: 'total'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'view', name: 'view'}
            ]
        });

        let productsTable = $('#product_list');
        productsTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/order/{{$id}}/get-products/',
            columns: [
                {data: 'category', name: 'category'},
                {data: 'subcategory', name: 'subcategory'},
                {data: 'size', name: 'size'},
                {data: 'weight', name: 'weight'},
                {data: 'quantity', name: 'quantity'},
            ]
        });
    </script>
@endsection
