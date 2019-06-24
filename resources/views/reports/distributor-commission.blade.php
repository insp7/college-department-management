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
                <span>Distributors Commission</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Distributors Commission
            <small>Get all the commission for each and every order and distributor.</small>
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


        <!-- IN PROCESS -->
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Distributor Commission</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="sales_list">
                            <thead>
                            <tr>
                                <th>Distributor</th>
                                <th>Retailer</th>
                                <th>Taxable Amount</th>
                                <th>Total GST</th>
                                <th>Total Amount</th>
                                <th>Total Commission</th>
                                <th>Created At</th>
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
    <script>
        var placedTable = $('#sales_list');
        placedTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/reports/get-distributors-commission',
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                autoPrint: true,
                title: '',
                repeatingHead: {
                    logo: 'https://www.google.co.in/logos/doodles/2018/world-cup-2018-day-22-5384495837478912-s.png',
                    logoPosition: 'right',
                    logoStyle: '',
                    title: '<h3>Sample Heading</h3>'
                }
            }, 'excel'],
            columns: [
                {data: 'distributor', name: 'distributor'},
                {data: 'retailer', name: 'retailer'},
                {data: 'amount', name: 'amount'},
                {data: 'gst', name: 'gst'},
                {data: 'total', name: 'total'},
                {data: 'commission', name: 'commission'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
    </script>
@endsection
