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
                <a href="/miscellaneous/city">Cities</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Edit City</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Edit City
            <small>Edit a city</small>
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


        <form action="/miscellaneous/area/{{ $city->id }}" method="POST">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="state">State :
                        <span class="required">*</span>
                    </label>
                    <select name="state_id" id="state" class="form-control" required>
                        <option value="{{ $city->state_id }}" selected="selected">{{ $city->state->name }}</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="group-name">City Name :
                        <span class="required">*</span>
                    </label>
                    <input id="group-name" name="name" type="text" class="form-control" placeholder="Enter the name of the city" value="{{ $city->name }}" required>
                </div>
            </div>
            <div class="text-right margin-bottom-25">
                <a class="btn default margin-right-10" id="cancel" href="/miscellaneous/city">Cancel</a>
                <button id="add-group" type="submit" name="add-group" class="btn red ">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')

    <script src="{{ asset("/js/miscellaneous/add-city.js") }}"></script>

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
                    title = "Group Added Successfully";
                    message = "The given group has been successfully added.";
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
                    title = "Failed To Add Group";
                    message = "The given group was failed while adding.";
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
@endsection
