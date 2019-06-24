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
                <a href="/gst">GST</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Edit GST</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">GST
            <small>Edit GST</small>
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

        <form action="/gst", method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="hsn_code">HSN Code
                        <span class="required">*</span>
                    </label>
                    <input type= "number" name="hsn_code" id="hsn_code" class="form-control" placeholder="Enter the HSN Code" value="{{ $gst->hsn_code }}" required/>
                </div>

                <div class="form-group col-md-6">
                    <label for="gst_rate">GST Rate
                        <span class="required">*</span>
                    </label>
                    <input type = "number" name="gst_rate" id="gst_rate" class="form-control" placeholder="Enter GST Rate" value="{{ $gst->gst_rate }}" required/>
                </div>

                <div class="form-group col-md-6">
                    <label for="wef">With Effect From
                        <span class="required">*</span>
                    </label>
                    <input type="date" name="wef" id="wef" class="form-control" value="{{ date("Y-m-d") }}" required/>
                </div>
            </div>
            <div class="text-right">
                <button id="add-gst" type="submit" name="add-gst" class="btn red">
                    Add GST
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')
    <script>
        $('#wef').valueAsDate = new Date();
    </script>
@endsection
