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
        <h3 class="page-title"> Add payment
            <small>Add a payment given by the customer.</small>
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

        <!-- FORM STARTS HERE -->
        <div class="container">
            <form action="/payment" method="POST">
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="retailer_id">Retailer : </label>
                        <select name="retailer_id" id="retailer_id" class="form-control">
                            <option></option>
                        </select>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="note">Note : </label>
                        <input type="text" id="note" class="form-control" placeholder="Enter any notes to the payment" name="note">
                    </div>

                    <div class="form-group col-md-6">
                        <br>
                        <label>Select the type of payment : </label>
                        <br>
                        <label class="mt-radio">
                            <input id="cash_radio" type="radio" name="mode" value="0" checked>
                            Cash
                        </label>

                        <label class="mt-radio">
                            <input id="cheque_radio" type="radio" name="mode" value="1">
                            Cheque
                        </label>
                    </div>

                    <div class="form-group col-md-6">
                        <br>
                        <label for="amount">Amount : </label>
                        <input name="amount" type="number" class="form-control" placeholder="Enter the amount">
                    </div>

                    <div class="col-md-12">
                        <h4 class="cheque-content">Cheque Details : </h4>
                        <br>
                    </div>

                    <div class="form-group col-md-6 cheque-content">
                        <label for="cheque_no">Cheque no : </label>
                        <input name="cheque_no" id="cheque_no" type="number" class="form-control" placeholder="Enter the cheque no : ">
                    </div>

                    <div class="form-group col-md-6 cheque-content">
                        <label for="bank_name">Bank Name : </label>
                        <input name type="text" id="bank_name" class="form-control" placeholder="Enter the bank name : ">
                    </div>

                    <div class="form-group col-md-6 cheque-content">
                        <label for="cheque_date">Cheque date : </label>
                        <input type="date" id="cheque_date" name="cheque_date" class="form-control" placeholder="Select the date of cheque : ">
                    </div>

                    <div class="col-md-12 margin-bottom-25">
                        <button class="btn btn-primary pull-right" type="submit">Add Payment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section ('custom-script')
    <!------------------------------------------------------------------------------------>
    <!--                          DATA-TABLES SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    <script>
        $('.cheque-content').hide();

        $('#cheque_radio').on('click', function() {
            $('.cheque-content').show();
        });

        $('#cash_radio').on('click', function() {
            $('.cheque-content').hide();
        });

        $('#retailer_id').select2({
            placeholder: "Select a retailer",
            ajax: {
                url: '/api/retailer/select-list',
                dataType: 'json'
            }
        });


        let paymentTable = $('#payment_list');
        paymentTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/payment/get-pending-payments',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'retailer', name: 'retailer'},
                {data: 'paid_amount', name: 'paid_amount'},
                {data: 'pending_amount', name: 'pending_amount'},
                {data: 'total_amount', name: 'total_amount'},
                {data: 'created_at', name: 'created_at'}
            ]
        });
    </script>


    <!-- TOASTR SECTION -->
    @if(session()->has('success_store') || session()->has('error_store'))
        <script>
            var title = "";
            var message = "";
            var type = "";
        </script>
        @if(session()->has('success_store'))
            <script>
                type = "success";
                title = "Payment Added";
                message = "Payment added successfully";
            </script>
            {{ Session::forget('success_store') }}
        @endif

        @if(session()->has('error_store'))
            <script>
                type = "error";
                title = "Failed to add payment";
                message = "{{ session('error_store') }}";
            </script>
            {{ Session::forget('error_store') }}
        @endif

        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr[type](message, title);
        </script>
    @endif
@endsection
