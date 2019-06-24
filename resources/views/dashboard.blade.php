@extends('layouts.base')

@section('page-content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                            <h5 class="h3 text-white mb-0">Sales value</h5>
                        </div>
                        <div class="col">
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                    <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                        <span class="d-none d-md-block">Month</span>
                                        <span class="d-md-none">M</span>
                                    </a>
                                </li>
                                <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                    <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                        <span class="d-none d-md-block">Week</span>
                                        <span class="d-md-none">W</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                            <h5 class="h3 mb-0">Total orders</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <!-- Members list group card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Team members</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar rounded-circle">
                                        <img alt="Image placeholder" src="../../public/assets/img/theme/team-1.jpg">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="#!">John Michael</a>
                                    </h4>
                                    <span class="text-success">●</span>
                                    <small>Online</small>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-sm btn-primary">Add</button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar rounded-circle">
                                        <img alt="Image placeholder" src="../../public/assets/img/theme/team-2.jpg">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="#!">Alex Smith</a>
                                    </h4>
                                    <span class="text-warning">●</span>
                                    <small>In a meeting</small>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-sm btn-primary">Add</button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar rounded-circle">
                                        <img alt="Image placeholder" src="../../public/assets/img/theme/team-3.jpg">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="#!">Samantha Ivy</a>
                                    </h4>
                                    <span class="text-danger">●</span>
                                    <small>Offline</small>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-sm btn-primary">Add</button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar rounded-circle">
                                        <img alt="Image placeholder" src="../../public/assets/img/theme/team-4.jpg">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <h4 class="mb-0">
                                        <a href="#!">John Michael</a>
                                    </h4>
                                    <span class="text-success">●</span>
                                    <small>Online</small>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-sm btn-primary">Add</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <!-- Checklist -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">To do list</h5>
                </div>
                <!-- Card body -->
                <div class="card-body p-0">
                    <!-- List group -->
                    <ul class="list-group list-group-flush" data-toggle="checklist">
                        <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                            <div class="checklist-item checklist-item-success">
                                <div class="checklist-info">
                                    <h5 class="checklist-title mb-0">Call with Dave</h5>
                                    <small>10:30 AM</small>
                                </div>
                                <div>
                                    <div class="custom-control custom-checkbox custom-checkbox-success">
                                        <input class="custom-control-input" id="chk-todo-task-1" type="checkbox" checked>
                                        <label class="custom-control-label" for="chk-todo-task-1"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                            <div class="checklist-item checklist-item-warning">
                                <div class="checklist-info">
                                    <h5 class="checklist-title mb-0">Lunch meeting</h5>
                                    <small>10:30 AM</small>
                                </div>
                                <div>
                                    <div class="custom-control custom-checkbox custom-checkbox-warning">
                                        <input class="custom-control-input" id="chk-todo-task-2" type="checkbox">
                                        <label class="custom-control-label" for="chk-todo-task-2"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                            <div class="checklist-item checklist-item-info">
                                <div class="checklist-info">
                                    <h5 class="checklist-title mb-0">Argon Dashboard Launch</h5>
                                    <small>10:30 AM</small>
                                </div>
                                <div>
                                    <div class="custom-control custom-checkbox custom-checkbox-info">
                                        <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">
                                        <label class="custom-control-label" for="chk-todo-task-3"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
                            <div class="checklist-item checklist-item-danger">
                                <div class="checklist-info">
                                    <h5 class="checklist-title mb-0">Winter Hackaton</h5>
                                    <small>10:30 AM</small>
                                </div>
                                <div>
                                    <div class="custom-control custom-checkbox custom-checkbox-danger">
                                        <input class="custom-control-input" id="chk-todo-task-4" type="checkbox" checked>
                                        <label class="custom-control-label" for="chk-todo-task-4"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <!-- Progress track -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Progress track</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar rounded-circle">
                                        <img alt="Image placeholder" src="../../public/assets/img/theme/bootstrap.jpg">
                                    </a>
                                </div>
                                <div class="col">
                                    <h5>Argon Design System</h5>
                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar rounded-circle">
                                        <img alt="Image placeholder" src="../../public/assets/img/theme/angular.jpg">
                                    </a>
                                </div>
                                <div class="col">
                                    <h5>Angular Now UI Kit PRO</h5>
                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar rounded-circle">
                                        <img alt="Image placeholder" src="../../public/assets/img/theme/sketch.jpg">
                                    </a>
                                </div>
                                <div class="col">
                                    <h5>Black Dashboard</h5>
                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar bg-red" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="#" class="avatar rounded-circle">
                                        <img alt="Image placeholder" src="../../public/assets/img/theme/react.jpg">
                                    </a>
                                </div>
                                <div class="col">
                                    <h5>React Material Dashboard</h5>
                                    <div class="progress progress-xs mb-0">
                                        <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="h3 mb-0">Activity feed</h5>
                </div>
                <div class="card-header d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <a href="#">
                            <img src="{{ asset('assets/img/theme/team-1.jpg') }}" class="avatar">
                        </a>
                        <div class="mx-3">
                            <a href="#" class="text-dark font-weight-600 text-sm">John Snow</a>
                            <small class="d-block text-muted">3 days ago</small>
                        </div>
                    </div>
                    <div class="text-right ml-auto">
                        <button type="button" class="btn btn-sm btn-primary btn-icon">
                            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                            <span class="btn-inner--text">Follow</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-4">
                        Personal profiles are the perfect way for you to grab their attention and persuade recruiters to continue reading your CV because you’re telling them from the off exactly why they should hire you.
                    </p>
                    <img alt="Image placeholder" src="{{ asset('assets/img/theme/img-1-1000x600.jpg') }}" class="img-fluid rounded">
                    <div class="row align-items-center my-3 pb-3 border-bottom">
                        <div class="col-sm-6">
                            <div class="icon-actions">
                                <a href="#" class="like active">
                                    <i class="ni ni-like-2"></i>
                                    <span class="text-muted">150</span>
                                </a>
                                <a href="#">
                                    <i class="ni ni-chat-round"></i>
                                    <span class="text-muted">36</span>
                                </a>
                                <a href="#">
                                    <i class="ni ni-curved-next"></i>
                                    <span class="text-muted">12</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6 d-none d-sm-block">
                            <div class="d-flex align-items-center justify-content-sm-end">
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Jessica Rowland">
                                        <img alt="Image placeholder" src="{{ asset('assets/img/theme/team-1.jpg') }}" class="">
                                    </a>
                                    <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Audrey Love">
                                        <img alt="Image placeholder" src="{{ asset('assets/img/theme/team-2.jpg') }}" class="rounded-circle">
                                    </a>
                                    <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Michael Lewis">
                                        <img alt="Image placeholder" src="{{ asset('assets/img/theme/team-3.jpg') }}" class="rounded-circle">
                                    </a>
                                </div>
                                <small class="pl-2 font-weight-bold">and 30+ more</small>
                            </div>
                        </div>
                    </div>
                    <!-- Comments -->
                    <div class="mb-1">
                        <div class="media media-comment">
                            <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="../../public/assets/img/theme/team-1.jpg">
                            <div class="media-body">
                                <div class="media-comment-text">
                                    <h6 class="h5 mt-0">Michael Lewis</h6>
                                    <p class="text-sm lh-160">Cras sit amet nibh libero nulla vel metus scelerisque ante sollicitudin. Cras purus odio vestibulum in vulputate viverra turpis.</p>
                                    <div class="icon-actions">
                                        <a href="#" class="like active">
                                            <i class="ni ni-like-2"></i>
                                            <span class="text-muted">3 likes</span>
                                        </a>
                                        <a href="#">
                                            <i class="ni ni-curved-next"></i>
                                            <span class="text-muted">2 shares</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media media-comment">
                            <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="../../public/assets/img/theme/team-2.jpg">
                            <div class="media-body">
                                <div class="media-comment-text">
                                    <h6 class="h5 mt-0">Jessica Stones</h6>
                                    <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                    <div class="icon-actions">
                                        <a href="#" class="like active">
                                            <i class="ni ni-like-2"></i>
                                            <span class="text-muted">10 likes</span>
                                        </a>
                                        <a href="#">
                                            <i class="ni ni-curved-next"></i>
                                            <span class="text-muted">1 share</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="media align-items-center">
                            <img alt="Image placeholder" class="avatar avatar-lg rounded-circle mr-4" src="../../public/assets/img/theme/team-3.jpg">
                            <div class="media-body">
                                <form>
                                    <textarea class="form-control" placeholder="Write your comment" rows="1"></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Page visits</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Page name</th>
                            <th scope="col">Visitors</th>
                            <th scope="col">Unique users</th>
                            <th scope="col">Bounce rate</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">
                                /argon/
                            </th>
                            <td>
                                4,569
                            </td>
                            <td>
                                340
                            </td>
                            <td>
                                <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                /argon/index.html
                            </th>
                            <td>
                                3,985
                            </td>
                            <td>
                                319
                            </td>
                            <td>
                                <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                /argon/charts.html
                            </th>
                            <td>
                                3,513
                            </td>
                            <td>
                                294
                            </td>
                            <td>
                                <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                /argon/tables.html
                            </th>
                            <td>
                                2,050
                            </td>
                            <td>
                                147
                            </td>
                            <td>
                                <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                /argon/profile.html
                            </th>
                            <td>
                                1,795
                            </td>
                            <td>
                                190
                            </td>
                            <td>
                                <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Social traffic</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Referral</th>
                            <th scope="col">Visitors</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">
                                Facebook
                            </th>
                            <td>
                                1,480
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">60%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Facebook
                            </th>
                            <td>
                                5,480
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">70%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Google
                            </th>
                            <td>
                                4,807
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">80%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Instagram
                            </th>
                            <td>
                                3,678
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">75%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                twitter
                            </th>
                            <td>
                                2,645
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2">30%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <!-- Optional JS -->

@endsection
