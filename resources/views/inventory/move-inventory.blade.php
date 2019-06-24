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
        <h3 class="page-title"> Move Inventory
            <small>Move a product from one warehouse to another</small>
        </h3>
        <!-- END PAGE TITLE-->

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


        <form action="/inventory/{{$id}}/move" method="POST">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="product">Product : </label>
                    <select name="product_id" id="product" class="form-control" disabled>
                        <option></option>
                        <option selected value="{{$inventory->product_id}}">{{$product_name}}</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="current_warehouse">From Warehouse : </label>
                    <select id="current_warehouse" class="form-control" disabled>
                        <option></option>
                        <option selected value="{{$inventory->warehouse_id}}">{{$inventory->warehouse->name}}</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="warehouse">To Warehouse : </label>
                    <select name="warehouse_id" id="warehouse" class="form-control">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="size" class="size">Current Quantity : </label>
                    <input type="number" class="form-control" placeholder="Enter the quantity : " value="{{$quantity}}"
                           disabled>
                </div>

                <div class="form-group col-md-6">
                    <label for="size" class="size">Quantity to move : </label>
                    <input type="number" class="form-control" placeholder="Enter the quantity to move  : "
                           name="quantity">
                </div>

                <input type="hidden" value="{{$inventory->product_id}}" name="product_id">
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
    <script>
        $('#product').select2({
            placeholder: "Select a product",
            ajax: {
                url: '/api/product/select-list',
                dataType: 'json'
            }
        });
        $('#current_warehouse').select2({
            placeholder: "Select the warehouse",
            ajax: {
                url: '/api/warehouse/select-list',
                dataType: 'json'
            }
        });
        $('#warehouse').select2({
            placeholder: "Select the warehouse where you want to move : ",
            ajax: {
                url: '/api/warehouse/select-list',
                dataType: 'json'
            }
        });
    </script>

    @if(session()->has('error_move'))
        <script>
            type = "error";
            title = "Failed to move inventory";
            message = "{{session('error_move')}}";

            {{ Session::forget('error_move') }}
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

