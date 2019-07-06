<li class="nav-item">
    <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true"
        aria-controls="navbar-dashboards">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text">Published Books</span>
    </a>
    <div class="collapse show" id="navbar-dashboards">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/published-books/create" class="nav-link">Add Published Book</a>
            </li>
            <li class="nav-item">
                <a href="/published-books" class="nav-link">Manage Published Books</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true"
        aria-controls="navbar-dashboards">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text">Research Projects</span>
    </a>
    <div class="collapse show" id="navbar-dashboards">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/research-projects/create" class="nav-link">Add Research Projects</a>
            </li>
            <li class="nav-item">
                <a href="/research-projects" class="nav-link">Manage Research Projects</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true"
        aria-controls="navbar-dashboards">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text">IPR</span>
    </a>
    <div class="collapse show" id="navbar-dashboards">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/ipr/create" class="nav-link">Add IPR</a>
            </li>
            <li class="nav-item">
                <a href="/ipr" class="nav-link">Manage IPR</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true"
        aria-controls="navbar-dashboards">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text">Publications</span>
    </a>
    <div class="collapse show" id="navbar-dashboards">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="/publications/create" class="nav-link">Add Publication</a>
            </li>
            <li class="nav-item">
                <a href="/publications" class="nav-link">Manage Publications</a>
            </li>
        </ul>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link active" href="/events/manage/{{ Auth::id() }}" role="button" aria-expanded="true"
        aria-controls="navbar-dashboards">
        <i class="ni ni-single-02 text-primary"></i>
        <span class="nav-link-text">Events</span>
    </a>
</li>
