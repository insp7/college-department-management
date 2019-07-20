<li class="nav-item">
    <a class="nav-link {{Request::is('admin/staff*') ? 'active' : ''}}" href="#navbar-staff" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-staff">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text">Staff</span>
    </a>
    <div class="collapse {{Request::is('admin/staff*') ? 'show' : ''}}" id="navbar-staff">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/admin/staff/create" class="nav-link">Add Staff</a>
            </li>
            <li class="nav-item">
                <a href="/admin/staff" class="nav-link">Manage Staff</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link {{Request::is('admin/events*') ? 'active' : ''}}" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text">Events</span>
    </a>

    <div class="collapse {{Request::is('admin/events*') ? 'show' : ''}}" id="navbar-dashboards">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/admin/events/create" class="nav-link">Add Events</a>
            </li>
            <li class="nav-item">
                <a href="/admin/events" class="nav-link">Manage Events</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link {{Request::is('classes*') ? 'active' : ''}}" href="#navbar-class" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-class">
        <i class="fa fa-layer-group text-primary"></i>
        <span class="nav-link-text">Class</span>
    </a>
    <div class="collapse {{Request::is('classes*') ? 'show' : ''}}" id="navbar-class">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/classes/create" class="nav-link">Add Class</a>
            </li>
            <li class="nav-item">
                <a href="/classes" class="nav-link">Manage Class</a>
            </li>
        </ul>
    </div>
</li>
