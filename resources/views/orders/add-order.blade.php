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
                <span>Orders</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Order</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Order
            <small>Place a order</small>
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
                        <i class="fa fa-tasks"></i> Manage Orders
                    </button>
                </div>
            </div>
        </div>


        <form action="/order" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 col-sm-12 margin-bottom-25">
                    <label for="retailer">Retailers</label>
                    <select name="retailer_id" id="retailer" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6 col-sm-12 margin-bottom-25">
                    <label for="address">Shipping Address</label>
                    <select name="address" id="address" class="form-control">
                        <option></option>
                    </select>
                </div>


                <!-- GROUPS SECTION -->
                <div class="form-group col-md-12">
                    <br>
                    <table class="table table-bordered" id="group_list">
                        <thead>
                        <tr class="text-center">
                            <th>Sr. No</th>
                            <th>Product</th>
                            <th>Units</th>
                        </tr>
                        </thead>
                        <tbody id="table-body">
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                <button id="add-item" type="button" class="btn blue pull-right"> Add Item</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="text-right">
                <button id="add-product" type="submit" name="place-order" class="btn red">
                    Place Order
                </button>
                <br><br>
            </div>
        </form>
    </div>

    <!-- ADD MODAL -->

    <div class="modal fade" role="dialog" id="addAddress">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add shipping address</h4>
                </div>

                <div class="modal-body">
                    <form action="/retailer" method="POST" enctype="multipart/form-data" id="add-address-form">
                    @csrf
                    <!-- START OF MODAL BODY -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="city">City</label>
                                <select name="city_id" id="city" class="form-control city-select col-md-12" style="width: 100%">
                                    <option></option>
                                </select>
                            </div>

                            <div class="form-group col-md-12 margin-bottom-25">
                                <label for="shipping-address">Address</label>
                                <input type="text" id="shipping-address" placeholder="Enter the shipping address"
                                       name="address"
                                       class="form-control">
                            </div>
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
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--END OF ADD BUTTON MODAL-->

@endsection

@section ('custom-script')

    <script src="{{ asset("js/orders/add-order.js") }}"></script>

    @include('components.show-toast');

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
            @endswitch
            {{ Session::forget('success') }}
        @endif

        @if(session()->has('error'))
            <script>
                type = "error";
            </script>
            @switch(session('error'))
                @case('store')
                <script>
                    title = "Failed To Add Product";
                    message = "The given product was failed while adding.";
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
