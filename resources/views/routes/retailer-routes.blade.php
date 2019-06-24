<!-- DASHBOARD PILL -->
<li class="nav-item start {{Request::is('dashboard') ? 'open active' : ''}}">
    <a href="/dashboard" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
    </a>
</li>
<!-- END OF DASHBOARD PILL -->

<!-- ORDER PILLS -->
<li class="nav-item  {{ Request::is('order*') ? 'open active' : '' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-users"></i>
        <span class="title">Orders</span>
        <span class="arrow  {{ Request::is('order*') ? 'open' : '' }}"></span>
    </a>

    <ul class="sub-menu">
        <!-- ADD ORDER PILL -->
        <li class="nav-item  {{ Request::is('order/add') ? 'open' : '' }}">
            <a href="/order/add" class="nav-link ">
                <span class="title">Add Order</span>
            </a>
        </li>

        <!-- MANAGE ORDER PILL -->
        <li class="nav-item  {{ Request::is('order/manage') ? 'open' : '' }}">
            <a href="/order" class="nav-link ">
                <span class="title">Manage Orders</span>
            </a>
        </li>
    </ul>
</li>
<!-- END OF ORDER PILLS -->


<!-- PRODUCT PILLS -->
<li class="nav-item {{ Request::is('product*') ? 'open active' : '' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-file-text-o"></i>
        <span class="title">Products</span>
        <span class="arrow {{ Request::is('product*') ? 'open' : '' }}"></span>
    </a>
    <ul class="sub-menu">
        <!-- ADD PRODUCT PILL -->
        <li class="nav-item  {{ Request::is('product/create*') ? 'open' : '' }}">
            <a href="/product/create" class="nav-link ">
                <span class="title">Add Product</span>
            </a>
        </li>

        <!-- MANAGE PRODUCT PILL -->
        <li class="nav-item {{ Request::is('product/manage') ? 'open' : '' }}">
            <a href="/product" class="nav-link ">
                <span class="title">View Products</span>
            </a>
        </li>
    </ul>
</li>
<!-- END OF PRODUCT PILLS -->



<!-- SUBDISTRIBUTOR PILLS -->
<li class="nav-item  {{ Request::is('sub-distributor*') ? 'open active' : '' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-cubes"></i>
        <span class="title">Sub-Distributors</span>
        <span class="arrow {{ Request::is('sub-distributor*') ? 'open' : '' }}"></span>
    </a>
    <ul class="sub-menu">
        <!-- ADD SUB-DISTRIBUTOR PILL-->
        <li class="nav-item {{ Request::is('sub-distributor/add') ? 'open' : '' }}">
            <a href="/sub-distributor/add" class="nav-link ">
                <span class="title">Add Sub-Distributor</span>
            </a>
        </li>

        <!-- MANAGE SUB-DISTRIBUTOR PILL -->
        <li class="nav-item {{ Request::is('sub-distributor/manage') ? 'open' : '' }}">
            <a href="/sub-distributor" class="nav-link ">
                <span class="title">Manage Sub-Distributors</span>
            </a>
        </li>
    </ul>
</li>
<!-- END OF SUB-DISTRIBUTOR PILLS -->

<!-- EMPLOYE PILLS -->
<li class="nav-item {{ Request::is('employee*') ? 'open active' : '' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-cubes"></i>
        <span class="title">Employees</span>
        <span class="arrow {{ Request::is('employee*') ? 'open' : '' }}"></span>
    </a>
    <ul class="sub-menu">
        <!-- ADD EMPLOYEE PILL -->
        <li class="nav-item {{ Request::is('employee/create') ? 'open' : '' }}">
            <a href="/employee/create" class="nav-link ">
                <span class="title">Add Employee</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('employee/manage') ? 'open' : '' }}">
            <a href="/employee" class="nav-link ">
                <span class="title">Manage Employees</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item  {{ Request::is('retailer*') ? 'open active' : '' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-users"></i>
        <span class="title">Retailers</span>
        <span class="arrow {{ Request::is('retailer*') ? 'open' : '' }}"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{ Request::is('retailer/add') ? 'open' : '' }}">
            <a href="/retailer/add" class="nav-link ">
                <span class="title">Add Retailer</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('retailer/manage') ? 'open' : '' }}">
            <a href="/retailer" class="nav-link ">
                <span class="title">Manage Retailer</span>
            </a>
        </li>
    </ul>
</li>