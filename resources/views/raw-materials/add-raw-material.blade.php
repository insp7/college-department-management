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
                <a href="/raw-material">Raw Materials</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Raw Material</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Raw Material
            <small>Add a raw-material</small>
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

        <form action="/raw-material" , method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name *</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name"/>
                </div>

                <div class="form-group col-md-6 margin-bottom-25">
                    <label for="hsn-code" class="control-label">HSN Code</label>
                    <input name="hsn_code" type="text" class="form-control" id="hsn-code" placeholder="Enter the hsn code">
                </div>

            </div>


            <button class="btn red pull-right margin-bottom-25" type="submit">
                <i class="fa fa-plus"></i> Add Raw Material
            </button>
        </form>
    </div>
@endsection

@section ('custom-script')
    <script src="{{ asset("/js/raw-materials/add-raw-material.js") }}"></script>

    @if(session()->has('status'))
        <script>
            showToastr("{{ session('status') }}", "{{ session('title') }}", "{{ session('message') }}");
            {{ Session::forget('status') }}
        </script>
    @endif
@endsection
