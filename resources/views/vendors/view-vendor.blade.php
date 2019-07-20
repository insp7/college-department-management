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
                <span>Vendor</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>View Vendor</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Vendor
            <small>View a vendor</small>
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


        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name"
                       value="{{ $vendor->name }}" disabled/>
            </div>

            <div class="form-group col-md-6">
                <label for="weight">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email id"
                       value="{{ $vendor->email }}" disabled/>
            </div>

            <div class="form-group col-md-6">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter the phone number"
                       value="{{ $vendor->phone_number }}" disabled/>
            </div>

            <div class="form-group col-md-6">
                <label for="phone">Address</label>
                <input type="tel" name="address" id="address" class="form-control" placeholder="Enter the address"
                       value="{{ $vendor->address }}" disabled/>
            </div>

            <div class="form-group col-md-6">
                <label for="bank-name">Bank Name</label>
                <input type="text" name="bank_name" id="bank-name" class="form-control"
                       placeholder="Enter the bank name :" value="{{ $vendor->bank_name }}" disabled/>
            </div>

            <div class="form-group col-md-6">
                <label for="gst-no">GST NO</label>
                <input type="text" name="gst_no" id="gst-no" class="form-control" placeholder="Enter the GST No :"
                       value="{{ $vendor->gst_no }}" disabled/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-user font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Raw Materials</span>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="raw_material_inventory_list">
                            <thead>
                            <tr class="text-center">
                                <th> Invoice No </th>
                                <th> Raw Material </th>
                                <th> Quantity (In Kgs) </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')

    <script>
        var adminTable = $('#raw_material_inventory_list');
        adminTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/raw-material-inventory/get-inventory/vendor/{{ $vendor->id }}',
            columns: [
                {data: 'invoice_no', name: 'invoice_no'},
                {data: 'raw_material', name: 'raw_material'},
                {data: 'weight', name: 'weight'},
            ]
        });
    </script>
@endsection
