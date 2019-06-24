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
                <a href="/department">Departments</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Edit Department</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Edit Department
            <small>Edit a department</small>
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

        <form action="/department/{{$department->id}}" , method="POST">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name *</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name" value="{{ $department->name }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="company">Company *</label>
                    <input type="text" name="company" id="company" class="form-control" placeholder="Enter the company name : " value="{{ $department->company }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email Id : </label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter the email id : " value="{{ $department->email }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="phone_no">Phone No : </label>
                    <input type="tel" name="phone_no" id="phone_no" class="form-control" placeholder="Enter the phone number : " value="{{ $department->phone_no }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="gst_no">Gst NO : *</label>
                    <input type="text" name="gst_no" id="gst_no" class="form-control" placeholder="Enter the gst no : " value="{{ $department->gst_no }}">
                </div>



                <div class="form-group col-md-6">
                    <label for="address">Address *</label>
                    <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter the address of the department : ">{{ $department->address }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="state">State *</label>
                    <select name="state_id" id="state" class="form-control">
                        <option value="{{ $department->city->state->id }}">{{ $department->city->state->name }}</option>
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="city">City *</label>
                    <select name="city_id" id="city" class="form-control select-item">
                        <option value="{{ $department->city_id }}">{{ $department->city->name }}</option>
                        <option></option>
                    </select>
                </div>
            </div>


            <button class="btn red pull-right margin-bottom-25" type="submit">
                Save Changes
            </button>
            <a href="/department" class="btn default pull-right margin-right-10">
                Cancel
            </a>
        </form>
    </div>
@endsection

@section ('custom-script')
    <script src="{{ asset("js/departments/edit-department.js") }}"></script>

    @if(session()->has('status'))
        <script>
            showToastr("{{ session('status') }}", "{{ session('title') }}", "{{ session('message') }}");
            {{ Session::forget('status') }}
        </script>
    @endif
@endsection
