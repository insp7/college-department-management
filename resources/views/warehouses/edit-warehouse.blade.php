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
                <a href="/warehouse">Warehouses</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <span>Edit Warehouse</span>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Edit Warehouse
            <small>Edit a warehouse</small>
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

        <form action="/warehouse/{{ $warehouse->id }}" , method="POST">
            @method("PUT")
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name *</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name" value="{{ $warehouse->name }}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="department">Department *</label>
                    <select name="department_id" id="department" class="form-control select-item">
                        <option selected value="{{ $warehouse->department->id }}">{{ $warehouse->department->name }}</option>
                        <option></option>
                    </select>
                </div>
            </div>

            <button class="btn red pull-right margin-bottom-25" type="submit">
                Save Changes
            </button>
            <a class="btn default pull-right margin-right-10" href="/warehouse">Cancel</a>
        </form>
    </div>
@endsection

@section ('custom-script')
    <script>
        $('#department').select2({
            placeholder: "Select a department",
            ajax: {
                url: '/department/select-list',
                dataType: 'json'
            }
        });
    </script>

    @if(session()->has('success_store'))
        <script>
            let message = '{{ session('success_store') }}';
            successToastr('Warehouse added successfully', message);
        </script>
    @elseif(session()->has('error_update'))
        <script>
            let message = '{{ session('error_update') }}';
            errorToastr('Failed to update warehouse', message);
        </script>
    @endif
@endsection
