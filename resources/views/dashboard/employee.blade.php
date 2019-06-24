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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="dashboard-stat dashboard-stat2 blue">
                    <div class="visual">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$in_process_count}}">0</span>
                        </div>
                        <div class="desc">Pending Orders</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="dashboard-stat dashboard-stat2 red">
                    <div class="visual">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{$completed_count}}">0</span>
                        </div>
                        <div class="desc">Completed Orders</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>
        <!-- END OF DASHBOARD STATS CARDS -->
    </div>
@endsection
