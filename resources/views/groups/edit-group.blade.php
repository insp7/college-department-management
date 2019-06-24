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


        <form action="/groups/{{ $group->id }}" method="POST">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="group-name">Group Name : </label>
                    <input id="group-name" name="group_name" type="text" class="form-control" placeholder="Enter the name of the group" disabled>
                </div>

                <div class="form-group col-md-6">
                    <label for="promo-code">Promo Code : </label>
                    <input type="text" id="promo-code" name="promo_code" class="form-control" placeholder="Enter the promo code : " value="{{$group->promo_code}}">
                </div>

                <div class="form-group col-md-6">
                    <br>
                    <label>Select the type of discount : </label>
                    <br>
                    <label for="on-spot-discount" class="md-radio-inline">
                        <input id="on-spot-discount"
                               <?php echo ($group->discount_mode === \App\Constants\GroupConstants::ON_THE_SPOT_DISCOUNT_MODE) ? 'checked' : '' ; ?>
                               class="radio" type="radio" name="discount_mode" value="{{ \App\Constants\GroupConstants::ON_THE_SPOT_DISCOUNT_MODE }}">
                        On the Spot
                    </label>

                    <label for="cashback-discount" class="md-radio-inline">
                        <input id="cashback-discount"
                               <?php echo ($group->discount_mode === \App\Constants\GroupConstants::CASH_BACK_DISCOUNT_MODE) ? 'checked' : '' ; ?>
                               class="radio" type="radio" name="discount_mode" value="{{ \App\Constants\GroupConstants::CASH_BACK_DISCOUNT_MODE }}">
                        Cashback
                    </label>
                </div>

                <br>

                <div class="form-group col-md-6">
                    <br>
                    <label>Select mode of sale ( For commission calculation ) : </label>
                    <br>
                    <label for="unit-mode" class="md-radio-inline">
                        <input id="unit-mode"
                               <?php echo ($group->commission_mode === \App\Constants\GroupConstants::UNIT_COMMISSION_MODE) ? 'checked' : '' ; ?>
                               class="radio" type="radio" name="commission_mode" value="{{ \App\Constants\GroupConstants::UNIT_COMMISSION_MODE }}">
                        Units
                    </label>

                    <label for="weight-mode" class="md-radio-inline">
                        <input id="weight-mode"
                               <?php echo ($group->commission_mode === \App\Constants\GroupConstants::WEIGHT_COMMISSION_MODE) ? 'checked' : '' ; ?>
                               class="radio" type="radio" name="commission_mode" value="{{ \App\Constants\GroupConstants::WEIGHT_COMMISSION_MODE }}">
                        Weight (In Kg)
                    </label>
                </div>
            </div>
            <div class="text-right">

                <button id="add-group" type="submit" name="add-group" class="btn red margin-right-10">
                    <i class="fa fa-save"></i> Save Changes
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')
    @if(session()->has('success') || session()->has('error'))
        @if(session()->has('error'))
            @switch(session('error'))
                @case('update')
                <script>
                    errorToastr("Failed To Update Group", "The given group couldn't be updated.");
                </script>
                @break
            @endswitch
            {{ Session::forget('error') }}
        @endif
    @endif
@endsection
