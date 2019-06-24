@extends('layout')

@section('custom-styles')
    <link rel="stylesheet" href="{!! URL::asset("css/retailer/add-retailer.css") !!}">
@endsection

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Retailer</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Retailer</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Retailer
            <small>Add an retailer</small>
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

        <form action="/retailer" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name
                        <span class="required">*</span>
                    </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name"
                           value="{{ old('name') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email
                        <span class="required">*</span>
                    </label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email id"
                           value="{{ old('email') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone Number
                        <span class="required">*</span>
                    </label>
                    <input type="tel" name="phone_number" id="phone" class="form-control"
                           placeholder="Enter the phone number" value="{{ old('phone_number') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone_number">Company Name
                        <span class="required">*</span>
                    </label>
                    <input type="text" name="company" id="company" class="form-control"
                           placeholder="Enter the company name : " value="{{ old('company') }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="distributor">Distributor
                        <span class="required">*</span>
                    </label>
                    <select name="distributor_id" id="distributor" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="subdistributor">SubDistributor (optional)</label>
                    <select name="subdistributor_id" id="subdistributor" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="group">Group
                        <span class="required">*</span>
                    </label>
                    <select name="group_id" id="group" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="term">Term
                        <span class="required">*</span>
                    </label>
                    <input type="text" name="term" id="term" class="form-control" placeholder="Enter the term : ">
                </div>
                <div class="portlet light bordered col-md-12">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-lock fa-4x font-green"></i>
                            <span class="caption-subject sbold uppercase font-green">Credentials</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> Name</th>
                                <th> Value</th>
                                <th> Image</th>
                                <th> Include in invoice ?</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($credentials as $credential)
                                <tr>
                                    <td>
                                        {{ $credential->name }}
                                        <input type="hidden" value="{{ $credential->id }}" name="credential_id">
                                    </td>
                                    <td class="text-center">
                                        <input type="text" placeholder="Enter the value : " class="form-control"
                                               name="credential_text">
                                    </td>
                                    <td class="text-center">
                                        <small id="name-{{ $credential->id }}"></small>
                                        <button type="button" class="btn default" id="file-{{ $credential->id }}"
                                                onclick="document.getElementById('{{ $credential->id }}').click()">
                                            Choose file
                                        </button>
                                        <input id="{{ $credential->id }}" type="file"
                                               class="hidden credential-file-chooser"
                                               name="credential_file">
                                    </td>
                                    <td>
                                        <input type="checkbox" value="1">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-purple">
                            <i class="fa fa-truck fa-4x font-purple"></i>
                            <small class="caption-subject sbold uppercase">Shipping Addresses</small>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <table class="table table-bordered" id="address-table">
                            <thead>
                            <tr>
                                <th>State</th>
                                <th>City</th>
                                <th>Address</th>
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">
                                    <button type="button" class="btn blue" id="add-shipping-address">Add Address
                                    </button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-purple">
                            <i class="fa fa-truck fa-4x font-purple"></i>
                            <small class="caption-subject sbold uppercase">Transport</small>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <table id="transport-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Transport</th>
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>

                            <tfoot>
                            <tr>
                                <td class="text-right">
                                    <button id="add-transport" type="button" class="btn blue">Add Transport</button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>


            </div>
            <div class="text-right">
                <button id="add-retailer" type="submit" name="add-retailer" class="btn red">
                    Add Retailer
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection

@section('custom-script')
    <script>
        var oldDistributor = "{{ old('distributor_id') }}";
        var oldSubDistributor = "{{ old('subdistributor_id') }}";
    </script>

    <script src="{{ asset("js/retailers/add-retailer.js") }}"></script>

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
                    title = "Retailer Added Successfully";
                    message = "The given retailer has been successfully added.";
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
                    title = "Failed To Add Retailer";
                    message = "The given retailer was failed while adding.";
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
