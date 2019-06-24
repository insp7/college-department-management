@extends('layout')

@section('page-content')
    <div class="page-bar">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="/inventory">Inventories</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Move Inventory</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Add Inventory
            <small>Add a inventory</small>
        </h3>
        <!-- END PAGE TITLE-->

        <!-- ALERTS SECTION -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- END OF ALERT SECTION -->


        <div class="row">
            <div class="col-md-12">
                <div class="portlet">
                    <a class="btn red" href="/inventory">
                        <i class="fa fa-tasks"></i> Manage Inventory
                    </a>
                </div>
            </div>
        </div>


        <form action="/inventory" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="product">Product : </label>
                    <select name="product_id" id="product" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="warehouse">Warehouse : </label>
                    <select name="warehouse_id" id="warehouse" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="size" class="size">Quantity : </label>
                    <input type="number" class="form-control" placeholder="Enter the quantity : " name="quantity">
                </div>
            </div>
            <div class="text-right">
                <button id="add-product" type="submit" name="add-product" class="btn red">
                    Move Inventory
                </button>
                <br><br>
            </div>
        </form>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("js/inventory/add-inventory.js") }}"></script>

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
                    title = "Product Added Successfully";
                    message = "The given product has been successfully added.";
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
                    title = "Failed To Add Product";
                    message = "The given product was failed while adding.";
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
