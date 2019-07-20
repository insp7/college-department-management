@extends('layout')

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/invoice">Invoices</a>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Invoices
            <small>View the invoices.</small>
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
                            <i class="fa fa-briefcase font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">INVOICES</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="invoice_list">
                            <thead>
                            <tr class="text-center">
                                <th> Invoice no. </th>
                                <th> Retailer </th>
                                <th> Products </th>
                                <th> Total </th>
                                <th> Status </th>
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
        let invoiceTable = $('#invoice_list');
        invoiceTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/invoice/get-invoices',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'retailer', name: 'retailer'},
                {data: 'count', name: 'count'},
                {data: 'total', name: 'total'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'view', name: 'view'}
            ]
        });
    </script>
@endsection
