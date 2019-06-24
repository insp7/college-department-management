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
                <a href="/shape">Shapes</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Edit Raw Material</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Edit Raw Material
            <small>Edit a raw material</small>
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

        <form action="/shape/{{$shape->id}}" , method="POST">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="form-group col-md-12 margin-bottom-25">
                    <label for="name">Name *</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name" value="{{ $shape->name }}"/>
                </div>
            </div>


            <button class="btn red pull-right margin-bottom-25" type="submit">
                Save Changes
            </button>
            <a href="/shape" class="btn default pull-right margin-right-10">
                Cancel
            </a>
        </form>
    </div>
@endsection

@section ('custom-script')
    <script src="{{ asset("edit-shape.js") }}"></script>

    @if(session()->has('status'))
        <script>
            showToastr("{{ session('status') }}", "{{ session('title') }}", "{{ session('message') }}");
            {{ Session::forget('status') }}
        </script>
    @endif
@endsection
