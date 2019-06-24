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
                <span>Orders</span>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Order</span>
            </li>
            <li>
                <span>Mark as in process</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Update Order
            <small>Assign the order to a department.</small>
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


        <form action="/order/{{$id}}/update/in-process" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6 margin-bottom-25">
                    <label for="department">Location</label>
                    <select name="department_id" id="department" class="form-control ">
                        <option></option>
                    </select>
                </div>

                <div class="form-group col-md-6 margin-bottom-25">
                    <label for="warehouse">Warehouse</label>
                    <select name="warehouse_id" id="warehouse" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
            </div>

            <button id="add-product" type="submit" name="place-order" class="btn red pull-right margin-bottom-25">
                Assign Order
            </button>
            <a href="/order/{{$id}}/placed" class="btn default pull-right margin-right-10">Cancel</a>
        </form>
    </div>

@endsection

@section ('custom-script')

    <script>
        let departmentSelect = $('#department');
        departmentSelect.select2({
            placeholder: "Select the location where you want to transfer the order",
            ajax: {
                url: '/department/select-list',
                dataType: 'json'
            }
        });

        $('#warehouse').select2({
            placeholder: "Select a warehouse"
        });

        departmentSelect.change(function() {
            let departmentId = departmentSelect.val();

            if(departmentId !== -1) {
                $('#warehouse').select2({
                    placeholder: "Select a warehouse",
                    theme: "default",
                    ajax: {
                        url: '/api/warehouse/select-list/department/' + departmentId,
                        dataType: 'json'
                    }
                });
            }
        });
    </script>
@endsection
