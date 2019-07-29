@extends('layouts.base')

@section('custom-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-user"></i></a></li>
    <li class="breadcrumb-item"><a href="/admin/staff">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Staff</li>
@endsection

@section('actions')
    <a href="/admin/staff/create" class="btn btn-sm btn-neutral">New</a>
@endsection

@section('page-content')

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Staff</h3>
                    <p class="text-sm mb-0 text-success">
                        Registration Completed
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <table class="table  table-flush" id="staff-registration-completed-list">
                        <thead class="thead-light">
                        <tr>
                            <th> Name </th>
                            <th> DOB </th>
                            <th> Email </th>
                            <th> Contact No </th>
                            <th> Pan </th>
                            <th> Employee Id </th>
                            <th>edit</th>
                            <th>delete</th>
                            <th>view</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th> Name </th>
                            <th> DOB </th>
                            <th> Email </th>
                            <th> Contact No </th>
                            <th> Pan </th>
                            <th> Employee Id </th>
                            <th>edit</th>
                            <th>delete</th>
                            <th>view</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Staff</h3>
                    <p class="text-sm mb-0 text-danger">
                        Registration Pending
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush " id="staff-registration-pending-list">
                        <thead class="thead-light">
                        <tr>
                            <th> Email </th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th> Email </th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{--MODAL SECTION--}}
    <!-- DELETE MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Delete Published Book</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form  id="delete_form" method="POST">
                    <div class="modal-body">

                        @method('DELETE')
                        @csrf
                        <div class="form-body">
                            <!-- START OF MODAL BODY -->
                            <div class="container">
                                <label>Are you sure you want to delete the Published Book ?</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default  ml-auto" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <script>
        let manageRegistrationCompletedStaffTable = $('#staff-registration-completed-list');

        manageRegistrationCompletedStaffTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/staff/get-registered-staff',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'dob', name: 'dob'},
                {data: 'email', name: 'email'},
                {data: 'contact_no', name: 'contact_no'},
                {data: 'pan', name: 'pan'},
                {data: 'employee_id', name: 'employee_id'},
                {data: 'delete', name: 'delete'},
                {data: 'edit', name: 'edit'},
                {data: 'view', name: 'view'}
            ],
            language: {paginate: {previous: "<i class='fa fa-angle-left'>", next: "<i class='fa fa-angle-right'>"}}
        });

        manageRegistrationCompletedStaffTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $('#delete_form').attr('action', '/published-books/' + $id);
        })

        let manageRegistrationPendingStaffTable = $('#staff-registration-pending-list');

        manageRegistrationPendingStaffTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/staff/get-unregistered-staff',
            columns: [
                {data: 'email', name: 'email'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ],
            language: {paginate: {previous: "<i class='fa fa-angle-left'>", next: "<i class='fa fa-angle-right'>"}}
        });

    </script>

    @if(session()->has('type'))
        <script>
            $.notify({
                // options
                title: '<h4 style="color:white">{{ session('title') }}</h4>',
                message: '{{ session('message') }}',
            },{
                // settings
                type: '{{ session('type') }}',
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 3000,
                timer: 1000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });
        </script>
    @endif
@endsection
