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
                <a href="/shape-transfer">Shape Inventory</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Shape Inventory</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Shape Transfer
            <small>Add a shape transfer</small>
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

        <form action="/shape-transfer" method="POST">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="vendors">Vendor *</label>
                    <select name="vendor_id" id="vendors" class="form-control select-item">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="vendors">Invoices *</label>
                    <select name="invoice_no" id="invoices" class="form-control select-item">
                        <option></option>
                    </select>
                </div>

                <!-- RAW MATERIALS SECTION -->
                <div class="form-group col-md-12">
                    <br>
                    <label>Shapes : </label>
                    <table class="table table-bordered" id="group_list">
                        <thead>
                        <tr class="text-center">
                            <th>Sr. No</th>
                            <th>Raw Material</th>
                            <th>Shape</th>
                            <th>Weight</th>
                            <th>Scrap</th>
                        </tr>
                        </thead>
                        <tbody id="table-body">
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                <button id="add-item" type="button" class="btn blue pull-right">Add Item</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>


            <button class="btn red pull-right margin-bottom-25" type="submit">
                <i class="fa fa-plus"></i> Make Shape Transfer
            </button>
        </form>
    </div>
@endsection

@section ('custom-script')
    <script src="{{ asset("js/shape-transfers/add-shape-transfer.js") }}"></script>

    @include('components.show-toast')
@endsection
