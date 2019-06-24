@extends('layout')

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Orders</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Order
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
                        <a href="/order/placed" type="button" class="btn blue pull-right">View All</a>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="placed_list">
                            <thead>
                            <tr class="text-center">
                                <th> Sr. No </th>
                                <th> Retailer </th>
                                <th> No. of Bundles </th>
                                <th> Created On </th>
                                <th> View </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- IN PROCESS -->
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">In Process Orders</span>
                        </div>
                        <a href="/order/in-process" type="button" class="btn blue pull-right">View All</a>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="in_process_list">
                            <thead>
                            <tr class="text-center">
                                <th> Sr. No </th>
                                <th> Retailer </th>
                                <th> No. of Bundles </th>
                                <th> Created On </th>
                                <th> View </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- IN COMPLETE BILL -->
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Completed Orders</span>
                        </div>
                        <a href="/order/complete" type="button" class="btn blue pull-right">View All</a>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="complete_list">
                            <thead>
                            <tr class="text-center">
                                <th> Sr. No </th>
                                <th> Retailer </th>
                                <th> No. of Bundles </th>
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
    @if(session()->has('status'))
        <script>
            showToastr("{{ session('status') }}", "{{ session('title') }}", "{{ session('message') }}");
            {{ Session::forget('status') }}
        </script>
    @endif

    <script>
        var placedTable = $('#placed_list');
        placedTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/order/placed/all',
            paginate: false,
            filter: false,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'retailer', name: 'retailer'},
                {data: 'bundles', name: 'bundles'},
                {data: 'created_at', name: 'created_at'},
                {data: 'view', name: 'view'},
            ]
        });


        var inProcessTable = $('#in_process_list');
        inProcessTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/order/in-process/all',
            paginate: false,
            filter: false,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'retailer', name: 'retailer'},
                {data: 'bundles', name: 'bundles'},
                {data: 'created_at', name: 'created_at'},
                {data: 'view', name: 'view'},
            ]
        });

        var incompleteTable = $('#complete_list');
        incompleteTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/order/complete/all',
            paginate: false,
            filter: false,
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
