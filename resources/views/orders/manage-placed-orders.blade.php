@extends('layout')


@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <!-- TODO: Fix view button of table -->
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Orders</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Manage Placed Orders</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Placed Order
            <small>View the details of a order or update them.</small>
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
                            <span class="caption-subject font-blue bold uppercase">Placed Orders</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="placed_list">
                            <thead>
                            <tr class="text-center">
                                <th> Sr. No </th>
                                <th> Retailer </th>
                                <th> Units </th>
                                <th> Created On </th>
                                <th> View </th>
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
        var placedTable = $('#placed_list');
        placedTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/order/placed/all',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'retailer', name: 'retailer'},
                {data: 'bundles', name: 'bundles'},
                {data: 'created_at', name: 'created_at'},
                {data: 'view', name: 'view'},
            ]
        });
    </script>
@endsection
