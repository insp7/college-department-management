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
                <a href="/distributor">Distributor</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Distributor</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Distributor
            <small>Add an distributor</small>
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

        <form action="/distributor" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name
                        <span class="required">*</span>
                    </label>
                    <input type= "text" name="name" id="name" class="form-control" placeholder="Enter the name" required/>
                </div>

                <div class="form-group col-md-6">
                    <label for="weight">Email
                        <span class="required">*</span>
                    </label>
                    <input type = "email" name="email" id="email" class="form-control" placeholder="Enter email id" required/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone Number
                        <span class="required">*</span>
                    </label>
                    <input type = "tel" name="phone" id="phone" class="form-control" placeholder="Enter the phone number" required/>
                </div>
            </div>
            <div class="text-right">
                <button id="add-distributor" type="submit" name="add-distributor" class="btn red">
                    Add Distributor
                </button>
                <br><br>
            </div>
        </form>
    </div>
@endsection

@section('custom-script')
    @include('components.show-toast')
@endsection
