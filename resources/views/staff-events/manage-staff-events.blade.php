@extends('layouts.base')

@section('custom-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/staff-events"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/staff-events">Staff Event</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Staff Events</li>
@endsection

@section('actions')
    <a href="/staff-events/create" class="btn btn-sm btn-neutral">New</a>
@endsection

@section('page-content')

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Staff Events</h3>
                    <p class="text-sm mb-0">
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="staff-events">
                        <thead class="thead-light">
                        <tr>
                            <th> Date </th>
                            <th> Name of Event </th>
                            <th> Start Date </th>
                            <th> End Date</th>
                            <th> Type </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th> Date </th>
                            <th> Name of Event </th>
                            <th> Start Date </th>
                            <th> End Date</th>
                            <th> Type </th>
                            <th> Edit </th>
                            <th> Delete </th>
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
                    <h6 class="modal-title" id="modal-title-default">Delete Staff Event</h6>
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
                                <label>Are you sure you want to delete the Staff Event?</label>
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

    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>

    <script>
        let managedStaffEventTable = $('#staff-events');

        managedStaffEventTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/staff-events/get-staff-events',
            columns: [
                {data: 'date', name: 'date'},
                {data: 'name_of_event', name: 'name_of_event'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'type', name: 'type'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'}
            ],
            language: {paginate:{previous:"<i class='fa fa-angle-left'>",next:"<i class='fa fa-angle-right'>"}}

        });
            managedStaffEventTable.on('click', '.edit', function () {
            $id = $(this).attr('id');
            window.location.pathname = '/staff-events/' + $id + '/edit';
            });
        managedStaffEventTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $('#delete_form').attr('action', '/staff-events/' + $id);
        });

        // jQuery(document).ready(function(){
        //     managedStaffEventTable.DataTable.init();

        //     var buttons = new $.fn.dataTable.Buttons(staff-events, {
        //         buttons: [
        //             'copyHtml5',
        //             'excelHtml5',
        //             'csvHtml5',
        //             {
        //                 extend: 'colvis',
        //                 columns: ':not(.noVis)'
        //             },
        //             {
        //                 extend: 'pdfHtml5',
        //                 exportOptions: {
        //                     columns: ':visible'}
        //                 }
        //         ]
        //     }).container().appendTo($('#export-buttons'));


        //     $(".buttons-pdf").addClass("btn btn-default");
        //     $(".buttons-excel").addClass("btn btn-danger");
        //     $(".buttons-copy").addClass("btn btn-success");
        //     $(".buttons-csv").addClass("btn btn-warning");
        //     $('[name="staff-events_length"]').addClass("input-sm");
        // });

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
