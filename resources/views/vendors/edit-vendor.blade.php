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
                <span>Vendor</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Edit Vendor</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Vendor
            <small>Edit an vendor</small>
        </h3>
        <!-- END PAGE TITLE-->

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

        <form action="/vendor/{{ $vendor->id }}" method="POST">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type= "text" name="name" id="name" class="form-control" placeholder="Enter the name" value="{{ $vendor->name }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="weight">Email</label>
                    <input type = "email" name="email" id="email" class="form-control" placeholder="Enter email id" value="{{ $vendor->email }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone Number</label>
                    <input type = "tel" name="phone" id="phone" class="form-control" placeholder="Enter the phone number" value="{{ $vendor->phone_number }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Address</label>
                    <input type = "tel" name="address" id="address" class="form-control" placeholder="Enter the address" value="{{ $vendor->address }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="bank-name">Bank Name</label>
                    <input type = "text" name="bank_name" id="bank-name" class="form-control" placeholder="Enter the bank name :" value="{{ $vendor->bank_name }}" />
                </div>

                <div class="form-group col-md-6">
                    <label for="gst-no">GST NO</label>
                    <input type = "text" name="gst_no" id="gst-no" class="form-control" placeholder="Enter the GST No :" value="{{ $vendor->gst_no }}"/>
                </div>

            </div>
            <div class="text-right">
                <button id="add-vendor" type="submit" name="add-vendor" class="btn red">
                    Edit Vendor
                </button>
                <br><br>
            </div>
        </form>
    </div>
@endsection
