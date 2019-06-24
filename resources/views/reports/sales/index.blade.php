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
        <h3 class="page-title"> Sales Reports
        </h3>
        <!-- END PAGE TITLE-->

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-dollar fa-4x font-blue"></i>
                            <span class="caption-subject font-blue sbold uppercase">Overall Annual Sales</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="annual-sales-chart" class="chart"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('custom-script')
    <!-- AM CHARTS RESOURCES -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <script src="{{ asset("js/reports/sales.js") }}"></script>
@endsection
