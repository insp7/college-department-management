<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title>Quick ERP | Manage Category</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href=" {{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ URL::asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ URL::asset('assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{ URL::asset('assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}"/>
    <link href="{{ URL::asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    @yield('custom-styles')
    <!-- END PAGE LEVEL PLUGINS -->
    <link rel="shortcut icon" href="favicon.png"/>
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">

@include('components.header')

<!-- BEGIN CONTAINER -->
<div class="page-container">
    @include('components.sidenav')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @yield('page-content')
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

@include('components.footer')

<!--[if lt IE 9]>
<script src="{{ URL::asset('assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{!! URL::asset('assets/global/plugins/jquery.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/js.cookie.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')!!}"
        type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}"
        type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/jquery.blockui.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/uniform/jquery.uniform.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{!! URL::asset('assets/global/scripts/app.min.js') !!}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{!! URL::asset('assets/layouts/layout/scripts/layout.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('assets/layouts/global/scripts/quick-sidebar.min.js') !!}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{!! URL::asset('assets/global/plugins/bootstrap-toastr/toastr.min.js') !!}"></script>
<script src="{!! URL::asset('js/toastr-wrapper.js') !!}"></script>
<script src="{!! URL::asset('assets/global/plugins/counterup/jquery.waypoints.min.js') !!}"
        type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/counterup/jquery.counterup.min.js') !!}"
        type="text/javascript"></script>

<script src="{!! URL::asset('assets/global/scripts/datatable.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/datatables/datatables.min.js') !!}" type="text/javascript"></script>
<script src="{!! URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>


@yield('custom-script')

</body>

</html>
