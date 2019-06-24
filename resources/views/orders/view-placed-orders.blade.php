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
                <span>Orders</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span href="/order/create">Add Order</span>
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

                <div class="col-md-4 mt-step-col danger">
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

                <div class="col-md-4 mt-step-col last danger">
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

        <div class="clearfix">
            <a class="btn blue pull-right" href="/order/{{$id}}/mark-in-process">Accept Order</a>
            <button data-toggle="modal" data-target="#cancelOrderModal" class="btn red pull-right margin-right-10">Cancel Order</button>
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
                                <th> Units </th>
                                <th> Edit </th>
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
                        <form action="/order/{{$id}}/update/in-process" id="delete_form" method="POST">
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container">
                                    <label>Are you sure you want to update the state to "In Process" ?</label>
                                    <br>
                                </div>
                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_category" class="btn btn-primary">
                                        Mark as "In Process"
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

    <!-- CANCEL ORDER MODAL -->
    <div class="modal fade" tabindex="-1" role="dialog" id="cancelOrderModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cancel Order</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <form action="/order/{{$id}}" id="delete_form" method="POST">
                            @method("DELETE")
                            @csrf
                            <div class="form-body">
                                <!-- START OF MODAL BODY -->
                                <div class="container margin-bottom-10">
                                    <label>Are you sure you want to cancel the order ? Once cancelled it cannot be undone. </label>
                                </div>
                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                                    <button id="edit_save" type="submit" name="edit_category" class="btn btn-primary">
                                        Confirm
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
    <!--END OF CANCEL ORDER MODAL-->


    <div class="modal fade" tabindex="-1" role="dialog" id="updateQuantityModal">
        <div class="modal-dialog" role="document">
            <form action="/order-products/{{ $id }}" id="update_quantity_form" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Product Quantity</h4>
                    </div>

                    <div class="modal-body">

                        <!-- START OF MODAL BODY -->
                        <div class="form-group">
                            <label for="quantity">Quantity to add : </label>
                            <input name="quantity" type="number" id="quantity"
                                   placeholder="Enter the quantity you want : " class="form-control" required>
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

@endsection


@section ('custom-script')
    @include('components.show-toast')

    <script>
    var productsTable = $('#product_list');
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
            {data: 'edit', name: 'edit'},
        ]
    });

    productsTable.on('click', '.update_quantity', function (e) {
        $id = $(this).attr('id');

        $.ajax({
            url: "/order-products/" + $id,
            method: "GET",
            dataType: "JSON",
            success: (data) => {
                $('#quantity').val(data.quantity);
            },
            error: (err) => {
                console.log(err.getMessage());
            }
        })
    });
    </script>
@endsection
