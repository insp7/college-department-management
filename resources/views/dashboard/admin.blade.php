@extends('layout')


@section('page-content')
    <div class="page-bar ">
        <!-- BREADCRUMBS SECTION -->
        <ul class="page-breadcrumb">
            <li>
                <a href="/dashboard">Home</a>
            </li>
        </ul>
        <!-- END OF BREADCRUMBS SECTION -->
        <div class="clearfix"></div>

        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Dashboard
            <small>Get a overview of the details here.</small>
        </h3>
        <!-- END PAGE TITLE-->


        <!-- DASHBOARD STATS CARD -->
        <div class="row margin-bottom-25">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat dashboard-stat2 blue">
                    <div class="visual">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$retailer_count}}">0</span>
                        </div>
                        <div class="desc">Total Customers</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat dashboard-stat2 red">
                    <div class="visual">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$order_count}}">0</span>
                        </div>
                        <div class="desc">Total Orders</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat dashboard-stat2 green">
                    <div class="visual">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$product_count}}">0</span>
                        </div>
                        <div class="desc">Total Products</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat dashboard-stat2 purple">
                    <div class="visual">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$warehouse_count}}">0</span>
                        </div>
                        <div class="desc">Total Warehouses</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TODAY'S PLACED ORDERS PORTLET -->
        <div class="container-fluid col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus fa-4x font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Today's Orders</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Retailer</th>
                                <th>City</th>
                                <th>Units</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Fetching the list of groups
                            use Illuminate\Http\Request;
                            $request = Request::create('/order/today/placed/', 'GET');
                            $response = Route::dispatch($request);
                            if($response->status() === 200) {
                            $orders = json_decode(Route::dispatch($request)->getContent(), true);
                            foreach ($orders as $order) {
                            ?>
                            <tr>
                                <td>{{ $order['retailer'] }}</td>
                                <td>{{ $order['city'] }}</td>
                                <td>{{ $order['units'] }}</td>
                                <td>
                                    <a href="/order/{{ $order['id'] }}/placed" class="btn green">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            }
                            if(sizeof($orders) === 0) {
                            ?>
                            <tr>
                                <td colspan="4" class="text-center">
                                    No new orders placed today.
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF TODAY'S PLACED ORDERS PORTLET -->


        <!-- TODAY'S DISPATCHED ORDERS PORTLET -->
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-truck fa-4x font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Today's Dispatched Orders</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Retailer</th>
                                <th>City</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $request = Request::create('/order/today/completed/', 'GET');
                            $response = Route::dispatch($request);
                            if($response->status() === 200) {
                            $orders = json_decode(Route::dispatch($request)->getContent(), true);
                            foreach ($orders as $order) {
                            ?>
                            <tr>
                                <td>{{ $order['retailer'] }}</td>
                                <td>{{ $order['city'] }}</td>
                                <td>
                                    <a href="/order/{{ $order['id'] }}/completed" class="btn green">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            }
                            if(sizeof($orders) === 0) {
                            ?>
                            <tr>
                                <td colspan="4" class="text-center">
                                    No new orders placed today.
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END OF TODAY'S DISPATCHED ORDERS PORTLET -->


        <div class="clearfix"></div>
        <!-- END OF DASHBOARD STATS CARDS -->
    </div>
@endsection


@section('custom-script')
@endsection
