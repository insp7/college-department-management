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
                <a href="/payment">Payments</a>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Manage Payments
            <small>View the payments.</small>
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
                            <i class="fa fa-money font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Order Payments</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="payment_list">
                            <thead>
                            <tr class="text-center">
                                <th> Retailer </th>
                                <th> Amount </th>
                                <th> Mode </th>
                                <th> Cheque no </th>
                                <th> Bank Name </th>
                                <th> Note </th>
                                <th> Created At </th>
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
        let paymentTable = $('#payment_list');
        paymentTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/payment/get-payments',
            columns: [
                {data: 'retailer', name: 'retailer'},
                {data: 'amount', name: 'amount'},
                {data: 'mode', name: 'mode'},
                {data: 'cheque_no', name: 'cheque_no'},
                {data: 'bank_name', name: 'bank_name'},
                {data: 'note', name: 'note'},
                {data: 'created_at', name: 'created_at'}
            ]
        });
    </script>
@endsection
