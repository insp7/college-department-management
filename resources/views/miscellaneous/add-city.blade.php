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
                <span>Add City</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add City
            <small>Add a city</small>
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


        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <a href="/groups" class="btn red">
                        <i class="fa fa-tasks"></i> Manage Cities
                    </a>
                </div>
            </div>
        </div>


        <form action="/miscellaneous/city" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="state">State :
                        <span class="required">*</span>
                    </label>
                    <select name="state_id" id="state" class="form-control" required>
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="group-name">City Name :
                        <span class="required">*</span>
                    </label>
                    <input id="group-name" name="name" type="text" class="form-control" placeholder="Enter the name of the city" required>
                </div>
            </div>
            <div class="text-right margin-bottom-25">
                <button id="add-group" type="submit" name="add-group" class="btn red">
                    <i class="fa fa-plus"></i> Add City
                </button>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')

    <script src="{{ asset("/js/miscellaneous/add-city.js") }}"></script>

    @include('components.show-toast')
@endsection
