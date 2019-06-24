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
                <span>Sales Register</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title margin-bottom-25"> Sales Register
            <small>Get a list of all the sales.</small>
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

        <!-- IN PROCESS -->
        <div class="row">

            <div class="col-md-12 margin-top-10">
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
                                <th>Bill No</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Gst No</th>
                                <th>PCS</th>
                                <th>KGS</th>
                                <th>TAXABLE AMOUNT</th>
                                <th>CGST</th>
                                <th>SGST</th>
                                <th>IGST</th>
                                <th>TCS</th>
                                <th>Tax Amount</th>
                                <th>R.O OFF</th>
                                <th>Net Amount</th>
                                <th>Tax Name</th>
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
    <!------------------------------------------------------------------------------------>
    <!--                          DATA-TABLES SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    <script src="{{ asset('js/reports/sales-register.js') }}"></script>
@endsection
