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
                <a href="/groups">Groups</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Group</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Group
            <small>Add a group</small>
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
                        <i class="fa fa-tasks"></i> Manage Groups
                    </a>
                </div>
            </div>
        </div>


        <form action="/groups" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="group-name">Group Name :
                        <span class="required">*</span>
                    </label>
                    <input id="group-name" name="group_name" type="text" class="form-control" placeholder="Enter the name of the group" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="promo-code">Promo Code :
                        <span class="required">*</span>
                    </label>
                    <input type="text" id="promo-code" name="promo_code" class="form-control" placeholder="Enter the promo code : " required>
                </div>

                <div class="form-group col-md-6">
                    <br>
                    <label for="discount-mode">Select the type of discount :
                        <span class="required">*</span>
                    </label>
                    <br>
                    <select name="discount_mode" id="discount-mode" class="form-control" required>
                        <option></option>
                        <option value="{{ \App\Constants\GroupConstants::CASH_BACK_DISCOUNT_MODE }}">Cashback</option>
                        <option value="{{ \App\Constants\GroupConstants::ON_THE_SPOT_DISCOUNT_MODE }}">On the spot</option>
                    </select>
                </div>

                <br>

                <div class="form-group col-md-6">
                    <br>
                    <label for="commission-mode">Select mode of sale ( For commission calculation ) :
                        <span class="required">*</span>
                    </label>
                    <br>

                    <select class="form-control" name="commission_mode" id="commission-mode" required>
                        <option></option>
                        <option value="{{ \App\Constants\GroupConstants::UNIT_COMMISSION_MODE }}">Units</option>
                        <option value="{{ \App\Constants\GroupConstants::WEIGHT_COMMISSION_MODE }}">Weight</option>
                    </select>
                </div>
            </div>
            <div class="text-right">
                <button id="add-group" type="submit" name="add-group" class="btn red">
                    <i class="fa fa-plus"></i> Add Group
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')

    <script>
        $('#discount-mode').select2({
            placeholder: "Select the discount type for the group",
            theme: "default"
        });

        $('#commission-mode').select2({
            placeholder: "Select th commission mode for the group",
            theme: "default"
        })
    </script>

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
