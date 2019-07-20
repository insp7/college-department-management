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
                <span>Supplier</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Supplier</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Supplier
            <small>Add an supplier</small>
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
        <!-- END OF ALERT SECTION -->

        <form action="/supplier" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type= "text" name="name" id="name" class="form-control" placeholder="Enter the name" value="{{ old('name') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="weight">Email</label>
                    <input type = "email" name="email" id="email" class="form-control" placeholder="Enter email id" value="{{ old('email') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone Number</label>
                    <input type = "tel" name="phone" id="phone" class="form-control" placeholder="Enter the phone number" value="{{ old('phone') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Address</label>
                    <input type = "tel" name="address" id="address" class="form-control" placeholder="Enter the address" value="{{ old('address') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="bank-name">Bank Name</label>
                    <input type = "tel" name="bank_name" id="bank-name" class="form-control" placeholder="Enter the bank name : " value="{{ old('bank_name') }}"/>
                </div>


                <div class="form-group col-md-6">
                    <label for="gst-no">GST NO</label>
                    <input type = "tel" name="gst_no" id="gst-no" class="form-control" placeholder="Enter the GST No : " value="{{ old('gst_no') }}"/>
                </div>
            </div>
            <div class="text-right">
                <button id="add-supplier" type="submit" name="add-supplier" class="btn red">
                    Add Supplier
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection
