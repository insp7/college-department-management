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
                <span>Expense Head</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Edit Expense Head</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Expense
            <small>Edit an expense head</small>
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

        <form action="/expense-head/{{ $expense_head->id }}" method="POST">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type= "text" name="name" id="name" class="form-control" placeholder="Enter the name" value="{{ $expense_head->name }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="phone">Address</label>
                    <input type = "tel" name="address" id="address" class="form-control" placeholder="Enter the address" value="{{ $expense_head->address }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="states"></label>
                    <select name="state_id" id="states" class="form-control">
                        <option></option>
                        <option selected value="{{ $expense_head->city->state_id }}">{{ $expense_head->city->state->name }}</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="cities"></label>
                    <select name="city_id" id="cities" class="form-control">
                        <option></option>
                        <option selected value="{{ $expense_head->city->id }}">{{ $expense_head->city->name }}</option>
                    </select>
                </div>
            </div>
            <div class="text-right">
                <button id="add-expense-head" type="submit" name="add-expense-head" class="btn red pull-right margin-bottom-25">
                    Save Changes
                </button>
                <a href="/expense-head" class="btn default pull-right margin-right-10">Cancel</a>
            </div>
        </form>
    </div>

@endsection

@section('custom-script')
    <script src="{{ asset("/js/expense-heads/add-expense-head.js") }}"></script>

    @if( session()->has('status') )
        <script>
            showToastr("{{ session('status') }}", "{{ session('title') }}", "{{ session('message') }}");
            {{ Session::forget('status') }}
        </script>
    @endif
@endsection
