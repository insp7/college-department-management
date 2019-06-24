@extends('layout')

<!-- TODO : Fix the "a product must be selected" issue. It arises whenever multiple blank columns are added. -->
@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Invoices</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Create Invoice</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Create Invoice
            <small>Create a direct invoice</small>
        </h3>
        <!-- END PAGE TITLE-->

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

        <form action="{{ route('order.generate-invoice') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="retailer">Retailers</label>
                    <select name="retailer_id" id="retailer" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="department">Location *</label>
                    <select name="department_id" id="department" class="form-control select-item">
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
                    <label>Products : </label>
                    <table class="table table-bordered" id="group_list">
                        <thead>
                        <tr class="text-center">
                            <th> Sr. No </th>
                            <th> Product </th>
                            <th> Warehouse </th>
                            <th> Units </th>
                            <th> Weight (In Gms) </th>
                            <th> Price </th>
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


                <div class="form-group col-md-12">
                    <label class="bold">
                        <input name="tcs" type="checkbox" class="form-control" value="1">
                        Is TCS Applicable ?
                    </label>
                </div>

                <div class="form-group col-md-6 ">
                    <label for="discount">No Of Bundles : <small class="required">*</small></label>
                    <input id="discount" class="form-control" type="number" name="no_of_bundles"
                           placeholder="Enter the total number of bundles : ">
                </div>

                <div class="form-group col-md-6 ">
                    <label for="discount">Discount Amount : </label>
                    <input id="discount" class="form-control" type="number" name="discount"
                           placeholder="Enter the amount of discount : " value="0.0">
                </div>

                <div class="form-group col-md-6 ">
                    <label for="discount-description">Discount Description : </label>
                    <input id="discount-description" type="text" name="discount_description"
                           placeholder="Enter the discount description : " class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="discount">Packaging Charges : </label>
                    <input id="discount" class="form-control" type="number" name="packaging_charges"
                           placeholder="Enter the total packaging charges : " value="0.0">
                </div>

                <div class="form-group col-md-6">
                    <label for="discount-description">Way Bill No : </label>
                    <input id="discount-description" type="text" name="way_bill_no"
                           placeholder="Enter the way bill no : " class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="transport">Transport : <small class="required">*</small></label>
                    <select name="transport" id="transport" class="form-control" required value="{{ old("transport") }}">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="vehicle-no">Vehicle No : </label>
                    <input id="vehicle-no" type="text" name="vehicle_no"
                           placeholder="Enter the vehicle no : " class="form-control">
                </div>

                <div class="form-group col-md-12">
                    <label for="discount-description">Note : </label>
                    <input id="discount-description" type="text" name="note"
                           placeholder="Enter any notes for the invoice : " class="form-control">
                </div>
            </div>
            <div class="text-right">
                <button id="add-product" type="submit" name="place-order" class="btn red">
                    Create Invoice
                </button>
                <br><br>
            </div>
        </form>
    </div>

    <!-- ADD MODAL -->
    <div class="modal fade" role="dialog" id="addTransport">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new transport</h4>
                </div>

                <div class="modal-body">
                    <form action="/retailer" method="POST" enctype="multipart/form-data" id="add-address-form">
                    @csrf
                    <!-- START OF MODAL BODY -->
                        <div class="row">

                            <div class="form-group col-md-12 margin-bottom-25">
                                <label for="transport-input">Transport</label>
                                <input type="text" id="transport-input" placeholder="Transport : "
                                       name="transport"
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
                    <form action="/retailer" method="POST" id="add-address-form">
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
    <script src="{{ asset("js/invoices/add-invoice.js") }}"></script>

    <script>
        $('#transport').select2({
            placeholder: "Select the transport",
            theme: "default",
            ajax: {
                url: "/retailer/" + $('#retailer').val() + "/transport/all",
                dataType: "json",
                processResults: (data) => {
                    var result = data.map((data) => {
                        return {
                            id: data,
                            text: data
                        };
                    });
                    return {
                        results: result
                    };
                }
            }
        }).on('select2:open', () => {
            // Storing the object. Since we need to add a on click listener.
            let object = $(".select2-results:not(:has(a))")
                .append('<a  href="javascript:;" id="add-transport" ' +
                    'style="padding: 6px;height: 20px;display: inline-table;" ' +
                    '>' +
                    'Add a new transport' +
                    '</a>');


            $('#add-transport').click(function () {
                let retailerId = $('#retailer').val();

                $('#add-address-form').attr('action', '/retailer/' + retailerId + "/transport");
                $('#addTransport').modal('show');
            });

            return object;
        });
    </script>



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
