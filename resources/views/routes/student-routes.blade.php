<li class="nav-item">
    <a class="nav-link {{Request::is('student-internship*') ? 'active' : ''}}" href="#navbar-dashboards"
        data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text">Student Courses</span>
    </a>
    <div class="collapse {{Request::is('student-courses*') ? 'show' : 'hide'}} " id="navbar-dashboards">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/student-courses/create" class="nav-link">Add Course</a>
            </li>
            <li class="nav-item">
                <a href="/student-courses" class="nav-link">Manage Courses</a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link  {{Request::is('student-internship*') ? 'active' : ''}}" href="#navbar-internship"
        data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-internship">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text">Student Internship </span>
    </a>
    <div class="collapse {{Request::is('student-internship*') ? 'show' : 'hide'}}" id="navbar-internship">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/student-internship/create" class="nav-link">Add Internship</a>
            </li>
            <li class="nav-item">
                <a href="/student-internship" class="nav-link">Manage Internships</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link {{Request::is('student-internship*') ? 'active' : ''}}" href="#navbar-scholarship"
        data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-scholarship">
        <i class="ni ni-hat-3 text-primary"></i>
        <span class="nav-link-text">Student Scholarships</span>
    </a>
    <div class="collapse {{Request::is('student-scholarship*') ? 'show' : 'hide'}} " id="navbar-scholarship">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/student-scholarships/create" class="nav-link">Add Scholarships</a>
            </li>
            <li class="nav-item">
                <a href="/student-scholarships" class="nav-link">Manage Scholarships</a>
            </li>
        </ul>
    </div>
</li>