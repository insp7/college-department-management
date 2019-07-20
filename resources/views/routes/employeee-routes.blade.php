<?php
$request = Request::create('/employee/user/' . Auth::id());
$privileges = json_decode(Route::dispatch($request)->getContent(), true)['privileges'];
?>

<!-- DASHBOARD PILL -->
<li class="nav-item start {{Request::is('dashboard') ? 'open active' : ''}}">
    <a href="/dashboard" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
    </a>
</li>
<!-- END OF DASHBOARD PILL -->


@if( in_array("ADD_ORDER", $privileges) || in_array("MANAGE_PLACED_ORDERS", $privileges) ||
     in_array("MANAGE_IN_PROCESS_ORDERS", $privileges) || in_array("MANAGE_COMPLETED_ORDERS", $privileges))
    <!-- ORDER PILLS -->
    <li class="nav-item  {{ Request::is('order*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-users"></i>
            <span class="title">Orders</span>
            <span class="arrow  {{ Request::is('order*') ? 'open' : '' }}"></span>
        </a>

        <ul class="sub-menu">
            <!-- ADD ORDER PILL -->
            @if( in_array("ADD_ORDER", $privileges) )
                <li class="nav-item  {{ Request::is('order/create') ? 'open' : '' }}">
                    <a href="/order/create" class="nav-link ">
                        <span class="title">Add Order</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE ORDER PILL -->
            @if( in_array("MANAGE_PLACED_ORDERS", $privileges) )
                <li class="nav-item  {{ Request::is('order/placed') ? 'open' : '' }}">
                    <a href="/order/placed" class="nav-link ">
                        <span class="title">View Placed Orders</span>
                    </a>
                </li>
            @endif

            @if( in_array("MANAGE_IN_PROCESS_ORDERS", $privileges) )
                <li class="nav-item  {{ Request::is('order/in-process') ? 'open' : '' }}">
                    <a href="/order/in-process" class="nav-link ">
                        <span class="title">View In Process Orders</span>
                    </a>
                </li>
            @endif

            @if( in_array("MANAGE_COMPLETED_ORDERS", $privileges) )
                <li class="nav-item  {{ Request::is('order/completed') ? 'open' : '' }}">
                    <a href="/order/complete" class="nav-link ">
                        <span class="title">View Completed Orders</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
    <!-- END OF ORDER PILLS -->
@endif


<!-- INVOICE PILLS -->
@if( in_array("ADD_INVOICE", $privileges) || in_array("MANAGE_INVOICES", $privileges) )
    <li class="nav-item  {{ Request::is('invoice*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-users"></i>
            <span class="title">Invoices</span>
            <span class="arrow  {{ Request::is('invoice*') ? 'open' : '' }}"></span>
        </a>

        <ul class="sub-menu">
            <!-- ADD ORDER PILL -->
            @if( in_array("ADD_INVOICE", $privileges) || in_array("MANAGE_INVOICES", $privileges) )
                <li class="nav-item  {{ Request::is('invoice/create') ? 'open' : '' }}">
                    <a href="/invoice/create" class="nav-link ">
                        <span class="title">Create Invoice</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE ORDER PILL -->
            @if( in_array("MANAGE_INVOICES", $privileges) )
                <li class="nav-item  {{ Request::is('invoice/manage') ? 'open' : '' }}">
                    <a href="/invoice" class="nav-link ">
                        <span class="title">Manage Invoices</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- END OF ORDER PILLS -->

<!-- PAYMENTS PILLS -->
@if( in_array("ADD_PAYMENT", $privileges) || in_array("MANAGE_PAYMENTS", $privileges) )
    <li class="nav-item  {{ Request::is('payment*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-dollar"></i>
            <span class="title">Payments</span>
            <span class="arrow  {{ Request::is('payment*') ? 'open' : '' }}"></span>
        </a>

        <ul class="sub-menu">
            <!-- ADD ORDER PILL -->
            @if( in_array("ADD_PAYMENT", $privileges))
                <li class="nav-item  {{ Request::is('payment/create') ? 'open' : '' }}">
                    <a href="/payment/create" class="nav-link ">
                        <span class="title">Add Payment</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE ORDER PILL -->
            @if( in_array("MANAGE_PAYMENTS", $privileges) )
                <li class="nav-item  {{ Request::is('payment') ? 'open' : '' }}">
                    <a href="/payment" class="nav-link ">
                        <span class="title">Manage Payments</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>w
@endif
<!-- END OF PAYMENTS PILLS -->

<!--PURCHASE PAYMENTS-->
@if( in_array("ADD_PURCHASE_PAYMENT", $privileges) || in_array("MANAGE_PURCHASE_PAYMENTS", $privileges) )
    <li class="nav-item  {{ Request::is('purchase-payment*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-dollar"></i>
            <span class="title">Purchase Payments</span>
            <span class="arrow  {{ Request::is('purchase-payment*') ? 'open' : '' }}"></span>
        </a>
    </li>
@endif
<!--.PURCHASE PAYMENTS-->

{{--<ul class="sub-menu">--}}
{{--<!-- ADD ORDER PILL -->--}}
{{--<li class="nav-item  {{ Request::is('purchase-payment/create') ? 'open' : '' }}">--}}
{{--<a href="/purchase-payment/create" class="nav-link ">--}}
{{--<span class="title">Add Purchase Payment</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--<!-- MANAGE ORDER PILL -->--}}
{{--<li class="nav-item  {{ Request::is('purchase-payment') ? 'open' : '' }}">--}}
{{--<a href="/purchase-payment" class="nav-link ">--}}
{{--<span class="title">Manage Purchase Payments</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--<!-- END OF PAYMENTS PILLS -->--}}


{{--<!-- EXPENSE HEADS PILLS -->--}}
{{--<li class="nav-item  {{ Request::is('expense*') ? 'open active' : '' }}">--}}
{{--<a href="javascript:;" class="nav-link nav-toggle">--}}
{{--<i class="fa fa-dollar"></i>--}}
{{--<span class="title">Expenses</span>--}}
{{--<span class="arrow  {{ Request::is('expense*') ? 'open' : '' }}"></span>--}}
{{--</a>--}}

{{--<ul class="sub-menu">--}}
{{--<!-- ADD EXPENSE HEAD -->--}}
{{--<li class="nav-item  {{ Request::is('expense-head/create') ? 'open' : '' }}">--}}
{{--<a href="/expense-head/create" class="nav-link ">--}}
{{--<span class="title">Add Expense Head</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--<!-- MANAGE EXPENSE HEADS -->--}}
{{--<li class="nav-item  {{ Request::is('expense-head') ? 'open' : '' }}">--}}
{{--<a href="/expense-head" class="nav-link ">--}}
{{--<span class="title">Manage Expense heads</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--<!-- ADD EXPENSE HEAD -->--}}
{{--<li class="nav-item  {{ Request::is('expense/create') ? 'open' : '' }}">--}}
{{--<a href="/expense-head/create" class="nav-link ">--}}
{{--<span class="title">Add Expense</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--<!-- MANAGE EXPENSE HEADS -->--}}
{{--<li class="nav-item  {{ Request::is('expense') ? 'open' : '' }}">--}}
{{--<a href="/expense-head" class="nav-link ">--}}
{{--<span class="title">Manage Expenses</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--<!-- END OF EXPENSE HEADS PILLS -->--}}

<!-- FEEDS -->
@if( in_array("ADD_FEED", $privileges) || in_array("MANAGE_FEEDS", $privileges))
    <li class="nav-item  {{ Request::is('feed*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-newspaper-o"></i>
            <span class="title">Feeds</span>
            <span class="arrow {{ Request::is('feed*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            <!-- ADD FEED -->
            @if( in_array("ADD_FEED", $privileges) )
                <li class="nav-item {{ Request::is('feed/create') ? 'open' : '' }}">
                    <a href="/feed/create" class="nav-link ">
                        <span class="title">Add Feed</span>
                    </a>
                </li>
            @endif
        <!--.ADD FEED -->

            <!-- MANAGE FEEDS -->
            @if( in_array("MANAGE_FEEDS", $privileges) )
                <li class="nav-item {{ Request::is('feed') ? 'open' : '' }}">
                    <a href="/feed" class="nav-link ">
                        <span class="title">Manage Feeds</span>
                    </a>
                </li>
        @endif
        <!--.MANAGE FEEDS -->
        </ul>
    </li>
@endif
<!--.FEEDS -->


<!-- PRODUCT PILLS -->
@if( in_array("ADD_PRODUCT", $privileges) || in_array("MANAGE_PRODUCTS", $privileges)
    || in_array("MANAGE_CATEGORIES", $privileges) ||  in_array("MANAGE_SUB_CATEGORIES", $privileges)
    || in_array("MANAGE_SIZES", $privileges) || in_array("MANAGE_WEIGHTS", $privileges) )
    <li class="nav-item {{ Request::is('product*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-tags"></i>
            <span class="title">Products</span>
            <span class="arrow {{ Request::is('product*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            <!-- ADD PRODUCT PILL -->
            @if( in_array("ADD_PRODUCT", $privileges) )
                <li class="nav-item  {{ Request::is('product/create*') ? 'open' : '' }}">
                    <a href="/product/create" class="nav-link ">
                        <span class="title">Add Product</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE PRODUCT PILL -->
            @if( in_array("MANAGE_PRODUCTS", $privileges) )
                <li class="nav-item {{ Request::is('product/manage') ? 'open' : '' }}">
                    <a href="/product" class="nav-link ">
                        <span class="title">Manage Products</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE CATEGORY PILL -->
            @if( in_array("MANAGE_CATEGORIES", $privileges) )
                <li class="nav-item {{ Request::is('product/manage/category') ? 'open' : '' }}">
                    <a href="/product/category" class="nav-link ">
                        <span class="title">Manage Categories</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE SUBCATEGORY PILL -->
            @if( in_array("MANAGE_SUB_CATEGORIES", $privileges) )
                <li class="nav-item {{ Request::is('product/manage/subcategory') ? 'open' : '' }}">
                    <a href="/product/subcategory" class="nav-link ">
                        <span class="title">Manage SubCategories</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE SIZE PILL -->
            @if( in_array("MANAGE_SIZES", $privileges) )
                <li class="nav-item {{ Request::is('product/manage/size') ? 'open' : '' }}">
                    <a href="/product/size" class="nav-link ">
                        <span class="title">Manage Sizes</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE WEIGHTPILL -->
            @if( in_array("MANAGE_WEIGHTS", $privileges) )
                <li class="nav-item {{ Request::is('product/manage/weight') ? 'open' : '' }}">
                    <a href="/product/weight" class="nav-link ">
                        <span class="title">Manage Weights</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- END OF PRODUCT PILLS -->

@if( in_array("ADD_SHAPE", $privileges) || in_array("MANAGE_SHAPES", $privileges) )
    <li class="nav-item  {{ Request::is('shape') || Request::is('shape/create') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-circle"></i>
            <span class="title">Shapes</span>
            <span class="arrow {{ Request::is('shape*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            @if( in_array("ADD_SHAPE", $privileges) )
                <li class="nav-item {{ Request::is('shape/create') ? 'open' : '' }}">
                    <a href="/shape/create" class="nav-link ">
                        <span class="title">Add Shape</span>
                    </a>
                </li>
            @endif

            @if( in_array("MANAGE_SHAPES", $privileges) )
                <li class="nav-item {{ Request::is('shape') ? 'open' : '' }}">
                    <a href="/shape" class="nav-link ">
                        <span class="title">Manage Shapes</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

@if( in_array("ADD_RAW_MATERIAL", $privileges) || in_array("MANAGE_RAW_MATERAILS", $privileges))
    <li class="nav-item  {{ Request::is('raw-material') || Request::is('raw-material/create') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-dropbox"></i>
            <span class="title">Raw Materials</span>
            <span class="arrow {{ Request::is('raw-material*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            @if( in_array("ADD_RAW_MATERIAL", $privileges))
                <li class="nav-item {{ Request::is('raw-material/create') ? 'open' : '' }}">
                    <a href="/raw-material/create" class="nav-link ">
                        <span class="title">Add Raw Materials</span>
                    </a>
                </li>
            @endif

            @if( in_array("MANAGE_RAW_MATERIALS", $privileges) )
                <li class="nav-item {{ Request::is('raw-material/create') ? 'open' : '' }}">
                    <a href="/raw-material/create" class="nav-link ">
                        <span class="title">Add Raw Materials</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

<!-- INVENTORY PILLS -->
@if( in_array("ADD_INVENTORY", $privileges) || in_array("MANAGE_INVENTORIES", $privileges) )
    <li class="nav-item  {{ Request::is('inventory*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-cubes"></i>
            <span class="title">Inventory</span>
            <span class="arrow {{ Request::is('inventory*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            <!-- ADD ADMIN PILL-->
            @if( in_array("ADD_INVENTORY", $privileges) )
                <li class="nav-item {{ Request::is('inventory/create') ? 'open' : '' }}">
                    <a href="/inventory/create" class="nav-link ">
                        <span class="title">Add Inventory</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE ADMIN PILL -->
            @if( in_array("MANAGE_INVENTORIES", $privileges) )
                <li class="nav-item {{ Request::is('inventory') ? 'open' : '' }}">
                    <a href="/inventory" class="nav-link ">
                        <span class="title">Manage Inventories</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- END OF INVENTORY PILLS -->

@if( in_array("SHAPE_INVENTORY", $privileges) )
    <li class="nav-item  {{ Request::is('shape-inventory*') ? 'open active' : '' }}">
        <a href="/shape-inventory" class="nav-link nav-toggle">
            <i class="fa fa-cube"></i>
            <span class="title">Shape Inventory</span>
            <span class="selected"></span>
        </a>
    </li>
@endif


@if( in_array("RAW_MATERIAL_INVENTORY", $privileges) )
    <li class="nav-item  {{ Request::is('raw-material-inventory*') ? 'open active' : '' }}">
        <a href="/raw-material-inventory" class="nav-link nav-toggle">
            <i class="fa fa-archive"></i>
            <span class="title">Raw Material Inventory</span>
            <span class="selected"></span>
        </a>
    </li>
@endif


<!-- PURCHASE PILLS -->
@if( in_array("ADD_PURCHASE", $privileges) || in_array("MANAGE_PURCHASES", $privileges) )
    <li class="nav-item  {{ Request::is('purchase*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-balance-scale"></i>
            <span class="title">Purchase</span>
            <span class="arrow {{ Request::is('purchase*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            <!-- ADD ADMIN PILL-->
            @if( in_array("ADD_PURCHASE", $privileges) )
                <li class="nav-item {{ Request::is('purchase/create') ? 'open' : '' }}">
                    <a href="/purchase/create" class="nav-link ">
                        <span class="title">Add Purchase</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE ADMIN PILL -->
            @if( in_array("MANAGE_PURCHASES", $privileges) )
                <li class="nav-item {{ Request::is('purchase') ? 'open' : '' }}">
                    <a href="/purchase" class="nav-link ">
                        <span class="title">Manage Purchases</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
<!-- END OF PURCHASE PILLS -->

<!-- WAREHOUSE PILLS -->
@if( in_array("ADD_DEPARTMENT", $privileges) || in_array("MANAGE_DEPARTMENTS", $privileges) )
    <li class="nav-item  {{ Request::is('department*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-bank"></i>
            <span class="title">Locations</span>
            <span class="arrow {{ Request::is('department*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            <!-- ADD ADMIN PILL-->
            @if( in_array("ADD_DEPARTMENT", $privileges) )
                <li class="nav-item {{ Request::is('department/create/') ? 'open' : '' }}">
                    <a href="/department/create" class="nav-link ">
                        <span class="title">Add Location</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE ADMIN PILL -->
            @if( in_array("MANAGE_DEPARTMENTS", $privileges) )
                <li class="nav-item {{ Request::is('department') ? 'open' : '' }}">
                    <a href="/department" class="nav-link ">
                        <span class="title">Manage Locations</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

<!-- WAREHOUSE PILLS -->
@if( in_array("ADD_WAREHOUSE", $privileges) || in_array("MANAGE_WAREHOUSES", $privileges))
    <li class="nav-item  {{ Request::is('warehouse*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-home"></i>
            <span class="title">Warehouses</span>
            <span class="arrow {{ Request::is('admin*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            <!-- ADD ADMIN PILL-->
            @if( in_array("ADD_WAREHOUSE", $privileges) )
                <li class="nav-item {{ Request::is('warehouse/create/') ? 'open' : '' }}">
                    <a href="/warehouse/create" class="nav-link ">
                        <span class="title">Add Warehouse</span>
                    </a>
                </li>
            @endif

        <!-- MANAGE ADMIN PILL -->
            @if( in_array("MANAGE_WAREHOUSES", $privileges) )
                <li class="nav-item {{ Request::is('warehouse') ? 'open' : '' }}">
                    <a href="/warehouse" class="nav-link ">
                        <span class="title">Manage Warehouses</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif


@if( in_array("ADD_SUPPLIER", $privileges) )
    <li class="nav-item  {{ Request::is('supplier*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-user"></i>
            <span class="title">Suppliers</span>
            <span class="arrow {{ Request::is('supplier*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            @if(in_array("ADD_SUPPLIER", $privileges))
                <li class="nav-item {{ Request::is('supplier/create') ? 'open' : '' }}">
                    <a href="/supplier/create" class="nav-link ">
                        <span class="title">Add Supplier</span>
                    </a>
                </li>
            @endif
            @if(in_array("MANAGE_SUPPLIERS", $privileges))
                <li class="nav-item {{ Request::is('supplier/manage') ? 'open' : '' }}">
                    <a href="/supplier" class="nav-link ">
                        <span class="title">Manage Suppliers</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif


@if(in_array("ADD_VENDOR", $privileges) || in_array("MANAGE_VENDORS", $privileges))
    <li class="nav-item  {{ Request::is('vendor*') ? 'open active' : '' }}">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-user"></i>
            <span class="title">Vendors</span>
            <span class="arrow {{ Request::is('vendor*') ? 'open' : '' }}"></span>
        </a>
        <ul class="sub-menu">
            @if(in_array("ADD_VENDOR", $privileges))
                <li class="nav-item {{ Request::is('vendor/create') ? 'open' : '' }}">
                    <a href="/vendor/create" class="nav-link ">
                        <span class="title">Add Vendor</span>
                    </a>
                </li>
            @endif

            @if(in_array("MANAGE_VENDORS", $privileges))
                <li class="nav-item {{ Request::is('vendor') ? 'open' : '' }}">
                    <a href="/vendor" class="nav-link ">
                        <span class="title">Manage Vendors</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif
