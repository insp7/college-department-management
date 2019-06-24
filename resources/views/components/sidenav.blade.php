<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="dashboard.html">
                <img src="{{ \Illuminate\Support\Facades\URL::asset('assets/img/brand/frcrceItlogo.png') }}" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    @switch(Auth::user()->role)
                        @case(\App\Constants\RoleConstants::ADMIN_ROLE)
                        @include('routes.admin-routes')
                        @break

                        @case(\App\Constants\RoleConstants::TEACHER_ROLE)
                        @include('routes.teacher-routes')
                        @break

                        @case(\App\Constants\RoleConstants::STUDENT_ROLE)
                        @include('routes.student-routes')
                        @break
                    @endswitch
                </ul>
            </div>
        </div>
    </div>
</nav>