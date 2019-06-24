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
                <span>Reports</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Sales Tax Summary</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Sales Tax Summary
            <small>HSN Wise Sales Tax summary.</small>
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


        <form>
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="from-date">From Date : </label>
                    <input type="date" id="from" class="form-control" name="from">
                </div>

                <div class="form-group col-md-6">
                    <label for="to-date">To Date : </label>
                    <input type="date" id="to" class="form-control" name="to">
                </div>
            </div>
            <div class="text-right">
                <button id="generate" type="button" name="generate" class="btn red">
                    Generate
                </button>
                <br><br>
            </div>
        </form>

        <!-- IN PROCESS -->
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Sales Register</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="sales_list">
                            <thead>
                            <tr class="text-center">
                                <th>HSN</th>
                                <th>Total KGS</th>
                                <th>Total Quantity</th>
                                <th>Total Taxable Value</th>
                                <th>CGST</th>
                                <th>SGST</th>
                                <th>IGST</th>
                                <th>Tax Amount</th>
                                <th>Round off</th>
                                <th>Total Amount</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section ('custom-script')
    <script src="{{ asset("js/reports/sales/tax-summary.js") }}"></script>
@endsection
