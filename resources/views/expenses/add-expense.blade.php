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
                <span>Expenses</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Add Expense</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Expenses
            <small>Add a expense</small>
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

        <form action="/expense" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="expense-heads"></label>
                    <select name="expense_head_id" id="expense-heads" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="category">Category</label>
                    <input type = "text" name="category" id="category" class="form-control" placeholder="Enter the category : "/>
                </div>

                <div class="form-group col-md-6">
                    <label for="order_no">Order No : </label>
                    <input type = "text" name="order_no" id="order_no" class="form-control" placeholder="Enter the order no : "/>
                </div>

                <div class="form-group col-md-6">
                    <label for="invoice_no">Invoice No : </label>
                    <input type = "text" name="invoice_no" id="invoice_no" class="form-control" placeholder="Enter the invoice no : "/>
                </div>

                <div class="form-group col-md-6">
                    <label for="bill_date">Bill Date</label>
                    <input type="date" name="bill_date" id="bill_date" class="form-control"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="total">Total Amount : </label>
                    <input type="number" name="total" id="total" class="form-control" placeholder="Enter the total amount : "/>
                </div>

                <div class="form-group col-md-6">
                    <label for="tax">Total Tax : </label>
                    <input type = "number" name="tax" id="tax" class="form-control" placeholder="Enter the total tax : "/>
                </div>

                <div class="form-group col-md-6">
                    <label for="discount">Discount : </label>
                    <input type = "text" name="discount" id="discount" class="form-control" placeholder="Enter the discount : "/>
                </div>

                <div class="form-group col-md-6">
                    <label for="discount_description">Discount Description : </label>
                    <input type = "text" name="discount_description" id="discount_description" class="form-control" placeholder="Enter the discount description : "/>
                </div>

                <div class="form-group col-md-12">
                    <label for="note">Note : </label>
                    <input type = "text" name="note" id="note" class="form-control" placeholder="Enter any note required : "/>
                </div>
            </div>
            <div class="text-right">
                <button id="add-expense-head" type="submit" name="add-expense-head" class="btn red margin-bottom-25">
                    Add Expense Head
                </button>
            </div>

        </form>
    </div>

@endsection

@section('custom-script')
    <script src="{{ asset("/js/expenses/add-expenses.js") }}"></script>

    @include('components.show-toast')
@endsection
