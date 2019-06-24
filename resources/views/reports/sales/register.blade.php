@extends('layout')

@section('meta-section')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/">Reports</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/">Sales</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ route('reports.sales.register') }}">Sales Register</a>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Sales Register
            <small>Generate Sales Register</small>
        </h3>
        <!-- END PAGE TITLE-->

        <!-- ALERTS SECTION -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- END OF ALERT SECTION -->

        <form>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="retailer">Retailer : </label>
                    <select name="retailers[]" id="retailers" multiple="multiple" class="form-control"
                            style="width: 100%;">
                        <option value=""></option>
                    </select>
                </div>

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


        <div class="row">
            <form method="POST" id="sales-form">
                @csrf
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
            </form>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("js/datatables-button.js") }}"></script>
    <script src="{{ asset("js/reports/sales/register.js") }}"></script>

    @include('components.show-toast')
@endsection
