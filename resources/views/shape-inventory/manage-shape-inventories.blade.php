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
                <a href="/shape-inventory">Shapes</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Shape Inventory
            <small>Inventory of a vendor</small>
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
                    <a class="btn red" href="/shape-transfer/create">
                        <i class="fa fa-plus"></i> Add Shape to Inventory
                    </a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-user font-red"></i>
                            <span class="caption-subject font-red bold uppercase">Shape Inventory</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="shape_inventory_list">
                            <thead>
                            <tr class="text-center">
                                <th> Shape </th>
                                <th> Weight </th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section ('custom-script')
    <script src="{{ asset("js/shape-inventory/manage-shape-inventories.js") }}"></script>

    @include('components.show-toast')
@endsection
