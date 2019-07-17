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
        <h3 class="page-title"> Dispatch Products
            <small>Select the products you want to dispatch</small>
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


        <form action="/order/dispatch/products" method="POST" id="invoice-form">
            @csrf
            <div class="row">


                <!-- PRODUCTS SECTION -->
                <div class="form-group col-md-12">
                    <br>
                    <input type="hidden" name="order_id" value="{{ $order_id }}">
                    <label>Check the products you want to dispatch : </label>
                    <table class="table table-bordered" id="group_list">
                        <thead>
                        <tr class="text-center">
                            <th>Select <small class="required">*</small></th>
                            <th>Item <small class="required">*</small></th>
                            <th>Requested Units <small class="required">*</small></th>
                            <th>Warehouse <small class="required">*</small></th>
                            <th>Quantity <small class="required">*</small></th>
                            <th>Weight</th>
                            <th>Price <small class="required">*</small></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Fetching the list of groups
                        use Illuminate\Http\Request;
                        $request = Request::create('/api/order/' . $order_id . '/products/', 'GET');
                        $products = json_decode(Route::dispatch($request)->getContent(), true);
                        ?>
                        <!-- CHECKING IF THE GROUPS ARE PRESENT OR NOT -->
                        @if(sizeof($products) > 0)
                            <!-- ITERATING TRHOUGH ALL GROUPS -->
                            <?php
                            for($i = 0;$i < sizeof($products);$i++) {
                            if($products[$i]['quantity'] > 0) {
                            ?>
                            <tr>
                                <td>
                                    <label class="mt-checkbox">
                                        <input type="checkbox" name="products[]" value="{{ $products[$i]['key'] }}" {{ old("products.$i") ? 'checked' : '' }}>
                                    </label>
                                </td>
                                <td>
                                    {!! $products[$i]['subcategory'] !!} | {!! $products[$i]['category'] !!}
                                    | {!! $products[$i]['size'] !!} |
                                    ( {!! $products[$i] === App\Constants\ProductConstants::PRODUCT_TYPE_UNITS ? 'UNITS'  : 'WEIGHT'!!}
                                    )
                                </td>
                                <td>
                                    {!! $products[$i]['quantity'] !!}
                                </td>
                                <td>
                                    <select name="warehouses[]" class="warehouses" style="width:200px;">
                                        <option></option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="units[]" class="form-control"
                                           placeholder="Enter the no of units" value="{{ old("units.$i") }}">
                                </td>
                                <td>
                                    <input type="text" name="weights[]" class="form-control"
                                           placeholder="Enter the total weight" value="{{ old("weights.$i") }}">
                                </td>
                                <td>
                                    <input type="text" name="price[]" class="form-control"
                                           placeholder="Enter the price" value="{{ old("price.$i") }}">
                                </td>
                            </tr>
                            <?php
                            }
                            }
                            ?>
                            <!-- END OF ITERATION -->
                        @else
                            <tr>
                                <td colspan="2" class="text-center"> No groups present. Please add some groups</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="form-group col-md-12">
                    <label class="bold">
                        <input name="tcs" type="checkbox" class="form-control" value="1" {{ old("tcs") ? "checked" : "" }}>
                        Is TCS Applicable ?
                    </label>
                </div>

                <div class="form-group col-md-6 ">
                    <label for="discount">No Of Bundles :
                        <small class="required">*</small>
                    </label>
                    <input id="discount" class="form-control" type="number" name="no_of_bundles"
                           placeholder="Enter the total number of bundles : " required value="{{ old("no_of_bundles") }}">
                </div>

                <div class="form-group col-md-6 ">
                    <label for="discount">Discount Amount : </label>
                    <input id="discount" class="form-control" type="number" name="discount"
                           placeholder="Enter the amount of discount : " value="0.0">
                </div>

                <div class="form-group col-md-6">
                    <label for="discount-description">Discount Description : </label>
                    <input id="discount-description" type="text" name="discount_description"
                           placeholder="Enter the discount description : " class="form-control" value="{{ old("discount_description") }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="discount">Packaging Charges : </label>
                    <input id="discount" class="form-control" type="number" name="packaging_charges"
                           placeholder="Enter the total packaging charges : " value="0.0">
                </div>

                <div class="form-group col-md-6">
                    <label for="discount-description">Way Bill No : </label>
                    <input id="discount-description" type="text" name="way_bill_no"
                           placeholder="Enter the way bill no : " class="form-control" value="{{ old("way_bill_no") }}">
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
                           placeholder="Enter the vehicle no : " class="form-control" value="{{ old("vehicle_no") }}">
                </div>

                <div class="form-group col-md-12">
                    <label for="discount-description">Note : </label>
                    <input id="discount-description" type="text" name="note"
                           placeholder="Enter any notes for the invoice : " class="form-control" value="{{ old("note") }}">
                </div>
            </div>
            <div class="text-right">
                <button id="add-product" type="submit" name="sumit" class="btn red">
                    Dispatch Order
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

@endsection

@section ('custom-script')

    <script>
        $('#category').select2({
            placeholder: "Select a category",
            ajax: {
                url: '/api/product/category/select-list',
                dataType: 'json'
            }
        });
        $('#size').select2({
            placeholder: "Select a size",
            ajax: {
                url: '/api/product/size/select-list',
                dataType: 'json'
            }
        });
        $('#weight').select2({
            placeholder: "Select a weight",
            ajax: {
                url: '/api/product/weight/select-list',
                dataType: 'json'
            }
        });
        $('#subcategory').select2({
            placeholder: "Select a subcategory",
            ajax: {
                url: '/api/product/subcategory/select-list',
                dataType: 'json'
            }
        });
        $('.warehouses').select2({
            placeholder: "Select the warehouse",
            ajax: {
                url: '/api/warehouse/select-list/department/{{ $order->warehouse->department_id }}',
                dataType: 'json'
            }
        });
        $('#transport').select2({
            placeholder: "Select the transport",
            theme: "default",
            ajax: {
                url: "/retailer/{{ $order->retailer->id }}/transport/all",
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
                let retailerId = "{{ $order->retailer_id }}";

                $('#add-address-form').attr('action', '/retailer/' + retailerId + "/transport");
                $('#addTransport').modal('show');
            });

            return object;
        });

        $('#invoice-form').submit(() => {
            $('input[type=submit]').addClass("disabled");
        })

    </script>

    @include('components.show-toast')


    @if(session()->has('error_dispatch'))
        <script>

            var type = "error";
            var title = "Order failed to dispatch";
            var message = "{{ session('error_dispatch') }}";
        </script>
        {{ Session::forget('success') }}

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
