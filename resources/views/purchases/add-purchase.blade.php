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
                <a href="/purchase">Purchases</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Purchase</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Purchase
            <small>Add a purchase</small>
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

        <form action="/purchase" method="POST">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="suppliers">Supplier *</label>
                    <select name="supplier_id" id="suppliers" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="vendors">Vendor *</label>
                    <select name="vendor_id" id="vendors" class="form-control select-item">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="transport">Transport : </label>
                    <input type="text" id="transport" name="transport" placeholder="Enter the transport name : "
                           class="form-control" value="{{ old('transport') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="invoice-no">Invoice No : </label>
                    <input type="text" id="invoice-no" class="form-control" placeholder="Enter the invoice no : "
                           name="invoice_no" value="{{ old('invoice_no') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="order-no">Order No : </label>
                    <input type="text" id="order-no" class="form-control" placeholder="Enter the order no : "
                           name="order_no" value="{{ old('order_no') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="challan-no">Challan No : </label>
                    <input type="text" id="challan-no" class="form-control" name="challan_no"
                           placeholder="Enter the challan no : " value="{{ old('challan_no') }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="lr-no" class="control-label">Lr-no</label>
                    <input type="text" class="form-control" id="lr-no" placeholder="Enter the lorry receipt no : "
                           name="lr_no" value="{{ old('lr_no') }}">
                </div>


                <!-- RAW MATERIALS SECTION -->
                <div class="form-group col-md-12">
                    <br>
                    <label>Raw Materials : </label>
                    <table class="table table-bordered" id="group_list">
                        <thead>
                        <tr class="text-center">
                            <th>Sr. No</th>
                            <th>Raw Material</th>
                            <th>Weight</th>
                            <th>Rate</th>
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

            <button class="btn red pull-right margin-bottom-25" type="submit">
                <i class="fa fa-plus"></i> Make Purchase
            </button>
        </form>
    </div>
@endsection

@section ('custom-script')
    <script src="{{ asset("js/purchases/add-purchase.js") }}"></script>

    @if(session()->has('status'))
        <script>
            showToastr("{{ session('status') }}", "{{ session('title') }}", "{{ session('message') }}");
            {{ Session::forget('status') }}
        </script>
    @endif
@endsection
