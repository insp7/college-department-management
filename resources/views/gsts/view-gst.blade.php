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
                <span>View GST</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">GST
            <small>View GST</small>
        </h3>
        <!-- END PAGE TITLE-->

        <div class="row">
        </div>

        <form action="/gst", method="POST" class="margin-bottom-25">
            @csrf
            <div class="clearfix margin-bottom-25">
                <a href="/gst/{{$gst->id}}/edit" class="pull-left btn red">Edit</a>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="hsn_code">HSN Code*</label>
                    <input type= "number" name="hsn_code" id="hsn_code" class="form-control" placeholder="Enter the HSN Code" value="{{ $gst->hsn_code }}" disabled/>
                </div>

                <div class="form-group col-md-6">
                    <label for="gst_rate">GST Rate*</label>
                    <input type = "number" name="gst_rate" id="gst_rate" class="form-control" placeholder="Enter GST Rate" value="{{ $gst->gst_rate }}" disabled/>
                </div>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')
    @if(session()->has('success') || session()->has('error'))
        <script>
            var title = "";
            var message = "";
            var type = "";
        </script>
        @if(session()->has('success'))
            <script>
                type = "success";
            </script>
            @switch(session('success'))
                @case('store')
                <script>
                    title = "GST Added Successfully";
                    message = "The given GST has been successfully added.";
                </script>
                @break
            @endswitch
            {{ Session::forget('success') }}
        @endif

        @if(session()->has('error'))
            <script>
                type = "danger";
            </script>
            @switch(session('error'))
                @case('store')
                <script>
                    title = "Failed To Add GST ";
                    message = "The given GST was failed while adding.";
                </script>
                @break
            @endswitch
            {{ Session::forget('error') }}
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
    <!-- END OF TOASTR SECTION -->
@endsection
