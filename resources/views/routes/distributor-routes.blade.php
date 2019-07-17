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
        <li class="nav-item  {{ Request::is('order/create') ? 'open' : '' }}">
            <a href="/order/create" class="nav-link ">
                <span class="title">Add Order</span>
            </a>
        </li>
    </ul>
</li>
<!-- END OF ORDER PILLS -->



<!-- INVOICE PILL -->
<li class="nav-item start {{Request::is('invoice*') ? 'open active' : ''}}">
    <a href="/invoice" class="nav-link nav-toggle">
        <i class="fa fa-file-text-o"></i>
        <span class="title">Invoices</span>
        <span class="selected"></span>
    </a>
</li>
<!-- END OF INVOICE PILL -->

<!-- SUBDISTRIBUTOR PILLS -->
<li class="nav-item  {{ Request::is('sub-distributor*') ? 'open active' : '' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-user"></i>
        <span class="title">Sub-Distributors</span>
        <span class="arrow {{ Request::is('sub-distributor*') ? 'open' : '' }}"></span>
    </a>
    <ul class="sub-menu">
        <!-- ADD SUB-DISTRIBUTOR PILL-->
        <li class="nav-item {{ Request::is('sub-distributor/create') ? 'open' : '' }}">
            <a href="/sub-distributor/create" class="nav-link ">
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

<li class="nav-item  {{ Request::is('retailer*') ? 'open active' : '' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-user"></i>
        <span class="title">Retailers</span>
        <span class="arrow {{ Request::is('retailer*') ? 'open' : '' }}"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{ Request::is('retailer/create') ? 'open' : '' }}">
            <a href="/retailer/create" class="nav-link ">
                <span class="title">Add Retailer</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('retailer/manage') ? 'open' : '' }}">
            <a href="/retailer" class="nav-link ">
                <span class="title">Manage Retailer</span>
            </a>
        </li>
    </ul>
</li>w
