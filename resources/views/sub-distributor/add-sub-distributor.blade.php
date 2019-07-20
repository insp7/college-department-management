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
                <span>SubDistributor</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add SubDistributor</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">SubDistributor
            <small>Add an subdistributor</small>
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

        <form action="/sub-distributor", method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type= "text" name="name" id="name" class="form-control" placeholder="Enter the name"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="weight">Email</label>
                    <input type = "email" name="email" id="email" class="form-control" placeholder="Enter email id"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone Number</label>
                    <input type = "tel" name="phone" id="phone" class="form-control" placeholder="Enter the phone number"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="distributor">Distributor *</label>
                    <select name="distributor_id" id="distributor" class="form-control">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="text-right">
                <button id="add-subdistributor" type="submit" name="add-subdistributor" class="btn red">
                    Add SubDistributor
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection

@section('custom-script')
    <script>
        $('#distributor').select2({
            placeholder: "Select a distributor",
            ajax: {
                url: '/api/distributor/select-list',
                dataType: 'json'
            }
        });
    </script>

    <!------------------------------------------------------------------------------------>
    <!--                            TOASTER'S SECTION                                   -->
    <!------------------------------------------------------------------------------------>
    @if(session()->has('success') || session()->has('error'))
        @if(session()->has('success'))
            @switch(session('success'))
                @case('store')
                <script>
                    successToastr("SubDistributor Added Successfully", "The given subdistributor has been successfully added.");
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
            @endswitch
            {{ Session::forget('error') }}
        @endif
    @endif
@endsection
