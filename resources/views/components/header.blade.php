<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/">
                <img src="{{ URL::asset('/assets/layouts/layout/img/logo.png') }}" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler"> </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="fa fa-user fa-2x white"></i>
                        <span class="username username-hide-on-mobile"><?php echo Auth::user()->name ?></span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
{{--                        <li>--}}
{{--                            <a href="{{ url('/user/profile') }}">--}}
{{--                                <i class="icon-user"></i> My Profile </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('/user/settings') }}">--}}
{{--                                <i class="fa fa-cog"></i>Settings </a>--}}
{{--                        </li>--}}
                        <li>
                            <a href="{{ url('/user/logout') }}">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->

            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>

<div class="clearfix"></div>
