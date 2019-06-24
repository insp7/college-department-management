@extends('layout')

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Admins</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Admin</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Admin
            <small>Add an admin</small>
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

        <form action="/admin", method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="name" >Name
                        <span class="required">*</span>
                    </label>
                    <input type= "text" name="name" id="name" class="form-control" placeholder="Enter the name" required value="{{ old('name') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email
                        <span class="required">*</span>
                    </label>
                    <input type = "email" name="email" id="email" class="form-control" placeholder="Enter email id" required value="{{ old('email') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone Number
                        <span class="required">*</span>
                    </label>
                    <input type = "tel" name="phone" id="phone" class="form-control" placeholder="Enter the phone number" required value="{{ old('phone') }}"/>
                </div>
            </div>
            <div class="text-right">
                <button id="add-admin" type="submit" name="add-admin" class="btn red">
                    Add Admin
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')
    <!------------------------------------------------------------------------------------>
    <!--                            TOASTER'S SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    @if(session()->has('success') || session()->has('error'))
        @if(session()->has('success'))
            @switch(session('success'))
                @case('store')
                <script>
                    successToastr("Admin Added Successfully", "The given admin has been successfully added.");
                </script>
                @break

                @case('update')
                <script>
                    successToastr("Admin Updated Successfully", "The given admin has been successfully updated.");
                </script>
                @break

                @case('destroy')
                <script>
                    successToastr("Admin Deleted Successfully", "The given admin has been successfully deleted.");
                </script>
                @break
            @endswitch
            {{ Session::forget('success') }}
        @endif

        @if(session()->has('error'))
            @switch(session('error'))
                @case('store')
                <script>
                    errorToastr("Failed To Add Admin", "The given admin was failed while adding.")
                </script>
                @break

                @case('update')
                <script>
                    errorToastr("Failed To Update Admin", "The given admin was failed while updating.")
                </script>
                @break

                @case('destroy')
                <script>
                    errorToastr("Failed To Delete Admin", "The given admin was failed while deletiing.")
                </script>
                @break
            @endswitch
            {{ Session::forget('error') }}
        @endif
    @endif
@endsection
