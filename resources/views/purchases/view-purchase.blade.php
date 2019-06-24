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
        <h3 class="page-title"> View Purchase
            <small>Add a purchase</small>
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

        <form action="/purchase" , method="POST">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="suppliers">Supplier *</label>
                    <select name="supplier_id" id="suppliers" class="form-control" disabled>
                        <option></option>
                        <option selected value="{{ $purchase->supplier_id }}">{{ $purchase->supplier->name }}</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="vendors">Vendor *</label>
                    <select name="vendor_id" id="vendors" class="form-control select-item" disabled>
                        <option></option>
                        <option selected value="{{ $purchase->vendor_id }}">{{ $purchase->vendor->name }}</option>
                    </select>
                </div>

                <!-- RAW MATERIALS SECTION -->
                <div class="form-group col-md-12">
                    <br>
                    <label>Raw Materials : </label>
                    <table class="table table-bordered" id="group_list">
                        <thead>
                        <tr class="text-center">
                            <th>Raw Material</th>
                            <th>Weight</th>
                            <th>Rate</th>
                        </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach($purchase->purchaseProducts as $purchaseProduct)
                                <td>{{ $purchaseProduct->rawMaterial->name }}</td>
                                <td>{{ $purchaseProduct->weight }}</td>
                                <td>{{ $purchaseProduct->rate }}</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
@endsection

@section ('custom-script')
    <script src="{{ asset("js/purchases/view-purchase.js") }}"></script>
@endsection
