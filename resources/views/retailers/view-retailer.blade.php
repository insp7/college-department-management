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
                <a href="/retailer">Retailer</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>View Retailer</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Retailer
            <small>View an retailer</small>
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

        <form action="/retailer/{{$retailer->id}}", method="POST">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name *</label>
                    <input value="{{$retailer->user->name}}" type= "text" name="name" id="name" class="form-control" placeholder="Enter the name" disabled/>
                </div>

                <div class="form-group col-md-6">
                    <label for="weight">Email *</label>
                    <input value="{{$retailer->user->email}}" type = "email" name="email" id="email" class="form-control" placeholder="Enter email id" disabled/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Phone Number *</label>
                    <input value="{{$retailer->user->phone_number}}" type = "tel" name="phone_number" id="phone" class="form-control" placeholder="Enter the phone number" disabled/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Company Name *</label>
                    <input value="{{$retailer->company}}" type= "text" name="company" id="company" class="form-control" placeholder="Enter the company name : " disabled/>
                </div>

                <div class="form-group col-md-6">
                    <label for="state">State *</label>
                    <select name="state_id" id="state" class="form-control" disabled>
                        <option></option>
                        <option selected value="{{$retailer->state->id}}">{{$retailer->state->name}}</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="city">Area *</label>
                    <select name="city_id" id="city" class="form-control select-item" disabled>
                        <option></option>
                        <option selected value="{{$retailer->city->id}}">{{$retailer->city->name}}</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="address">Address *</label>
                    <textarea name="address" id="address" class="form-control" rows="3" disabled>{{$retailer->address}}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="distributor">Distributor *</label>
                    <select name="distributor_id" id="distributor" class="form-control" disabled>
                        <option></option>
                        <option selected value="{{$retailer->distributor->id}}">{{$retailer->distributor->user->name}}</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="subdistributor">SubDistributor (optional)</label>
                    <select name="subdistributor_id" id="subdistributor" class="form-control" disabled>
                        <option></option>
                        @if($retailer->subdistributor)
                            <script>
                                alert("Sub present");
                            </script>
                            <option selected value="{{$retailer->subdistributor->id}}">{{$retailer->subdistributor->user->name}}</option>
                        @endif
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="group">Group </label>
                    <select name="group_id" id="group" class="form-control" disabled>
                        <option></option>
                        <option selected value="{{$retailer->group->id}}">{{$retailer->group->name}}</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="company">GST No *</label>
                    <input value="{{$retailer->gstNo()}}" type= "text" name="gst_no" id="company" class="form-control" placeholder="Enter the GST No : " disabled/>
                </div>


                <div class="form-group col-md-6">
                    <label for="transport">Transport</label>
                    <input type="text" name="transport" id="transport" class="form-control" placeholder="Enter the transport : " disabled value="{{ $retailer->transport }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="term">Term *</label>
                    <input type="text" name="term" id="term" class="form-control" placeholder="Enter the term : " value="{{ $retailer->term }}" disabled>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('custom-script')
    <script>
        // FETCHING ALL THE SELECT2's
        $('#state').select2({
            placeholder: "Select a state",
            ajax: {
                url: '/api/state/select-list',
                dataType: 'json'
            }
        });
        $('#city').select2({
            placeholder: "Select a area",
            ajax: {
                url: '/api/area/select-list',
                dataType: 'json'
            }
        });
        $('#distributor').select2({
            placeholder: "Select a distributor",
            ajax: {
                url: '/api/distributor/select-list',
                dataType: 'json'
            }
        });
        $('#subdistributor').select2({
            placeholder: "Select a sub-distributor",
            ajax: {
                url: '/api/sub-distributor/select-list',
                dataType: 'json'
            }
        });
        $('#group').select2({
            placeholder: "Select a group",
            ajax: {
                url: '/api/groups/select-list',
                dataType: 'json'
            }
        });
    </script>

    @if(session()->has('success') || session()->has('error'))
        <script>
            var title = "";
            var message = "";
            var type = "";
        </script>

        @if(session()->has('error'))
            <script>
                type = "danger";
            </script>
            @switch(session('error'))
                @case('update')
                <script>
                    title = "Failed To Update Retailer";
                    message = "The given retailer was failed while updating.";
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
