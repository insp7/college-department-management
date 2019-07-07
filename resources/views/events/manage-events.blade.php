@extends('layouts.base')

@section('custom-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin/events"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/admin/events">Events</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Events</li>
@endsection

@section('actions')
    <a href="/admin/events/create" class="btn btn-sm btn-neutral">New</a>
@endsection

@section('page-content')

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Datatable</h3>
                    <p class="text-sm mb-0">
                        This is an exmaple of datatable using the well known datatables.net plugin. This is a minimal setup in order to get started fast.
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush table-sm" id="events-list">
                        <thead class="thead-light">
                        <tr>
                            {{-- The comments next to <th></th> tags indicate the data representation format for the following <th></th> --}}
                            <th>Name</th>
                            <th>Details</th> <!-- $details. Address: $address -->
                            <th>Type</th>
                            <th>Funding</th> <!-- $total_funding. (institute: $institute_funding, sponsor: $sponsor_funding) -->
                            <th>Duration</th> <!-- Started from: $start_date. Ended on $end_date -->
                            <th>Total Participants</th> <!-- $internal + $external. (Internal: $internal. External: $external) -->
                            <th> Date </th>
                            <th>Add Cooordinator</th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Details</th> <!-- $details. Address: $address -->
                            <th>Type</th>
                            <th>Funding</th> <!-- $total_funding. (institute: $institute_funding, sponsor: $sponsor_funding) -->
                            <th>Duration</th> <!-- Started from: $start_date. Ended on $end_date -->
                            <th>Total Participants</th> <!-- $internal + $external. (Internal: $internal. External: $external) -->
                            <th>Date</th>
                            <th>Add Cooordinator</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
                    <h6 class="modal-title" id="modal-title-default">Delete Events</h6>
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
                                <label>Are you sure you want to delete the Events ?</label>
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
        let manageEventsTable = $('#events-list');

        manageEventsTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/events/get-events',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'details', name: 'details'},
                {data: 'type', name: 'type'},
                {data: 'funding', name: 'funding'},
                {data: 'duration', name: 'duration'},
                {data: 'total_participants', name: 'total_participants'},
                {data: 'date', name: 'date'},
                {data: 'add_coordinator', name: 'add_coordinator'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ]
        });

        manageEventsTable.on('click', '.add_coordinator', function() {
            $id = $(this).attr('id');
            window.location.pathname = '/admin/events/' + $id + '/assign-coordinator';
        });

        manageEventsTable.on('click', '.delete', function() {
            $id = $(this).attr('id');
            $('#delete_form').attr('action', '/admin/events/' + $id);
        });

        manageEventsTable.on('click', '.edit', function () {
            $id = $(this).attr('id');
            // console.log(window.location.pathname);
            window.location.pathname = '/admin/events/' + $id + '/edit';
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
