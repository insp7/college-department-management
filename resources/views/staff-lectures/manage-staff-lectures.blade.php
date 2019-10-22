@extends('layouts.base')

@section('custom-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/staff-lectures"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/staff-lectures">Staff Lecture</a></li>
    <li class="breadcrumb-item active" aria-current="page">Manage Staff Lectures</li>
@endsection

@section('actions')
    <a href="/staff-lectures/create" class="btn btn-sm btn-neutral">New</a>
@endsection

@section('page-content')

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Staff Lectures</h3>
                    <p class="text-sm mb-0">
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="staff-lectures">
                        <thead class="thead-light">
                        <tr>
                            <th> Date </th>
                            <th> Subject Name </th>
                            <th> Class </th>
                            <th> No. of Students </th>
                            <th> Expert Name </th>
                            <th> Expert Profile Link </th>
                            <th> Organization </th>
                            <th> Edit </th>
                            <th> Delete </th>
                            <th> View </th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th> Date </th>
                            <th> Subject Name </th>
                            <th> Class </th>
                            <th> No. of Students </th>
                            <th> Expert Name </th>
                            <th> Expert Profile Link </th>
                            <th> Organization </th>
                            <th> Edit </th>
                            <th> Delete </th>
                            <th> View </th>
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
                    <h6 class="modal-title" id="modal-title-default">Delete Staff Lecture</h6>
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
                                <label>Are you sure you want to delete the Staff Lecture ?</label>
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
<!-- View MODAL -->

    <div class="modal fade" tabindex="-1" role="dialog" id="viewModal">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="">
                    <img id="Report" style="width: 400px; height: 400px;"  src="report.pdf" alt="report.pdf">
                    </div>
                </div>
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
        let managedStaffLectureTable = $('#staff-lectures');

        managedStaffLectureTable.DataTable({
            processing: true,
            serverSide: true,
            ajax: '/staff-lectures/get-staff-lectures',
            columns: [
                {data: 'date', name: 'date'},
                {data: 'subject', name: 'subject'},
                {data: 'class', name: 'class'},
                {data: 'no_of_students', name: 'no_of_students'},
                {data: 'expert_name', name: 'expert_name'},
                {data: 'expert_profile', name: 'expert_profile'},
                {data: 'organization', name: 'organization'},
                {data: 'edit', name: 'edit'},
                {data: 'delete', name: 'delete'},
                {data: 'view', name: 'view'}
            ],
            language: {paginate:{previous:"<i class='fa fa-angle-left'>",next:"<i class='fa fa-angle-right'>"}}

        });
            managedStaffLectureTable.on('click', '.edit', function () {
            $id = $(this).attr('id');
            window.location.pathname = '/staff-lectures/' + $id + '/edit';
            });
        managedStaffLectureTable.on('click', '.delete', function(e) {
            $id = $(this).attr('id');
            $('#delete_form').attr('action', '/staff-lectures/' + $id);
        });
        managedStaffLectureTable.on('click', '.view', function(e) {
            $id = $(this).attr('id');
            $('#Report').attr('src', $id);
        });

        jQuery(document).ready(function(){
            managedStaffLectureTable.DataTable.init();

            var buttons = new $.fn.dataTable.Buttons(staff-lectures, {
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    {
                        extend: 'colvis',
                        columns: ':not(.noVis)'
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'}
                        }
                ]
            }).container().appendTo($('#export-buttons'));


            $(".buttons-pdf").addClass("btn btn-default");
            $(".buttons-excel").addClass("btn btn-danger");
            $(".buttons-copy").addClass("btn btn-success");
            $(".buttons-csv").addClass("btn btn-warning");
            // $('[name="staff-lectures_length"]').addClass("input-sm");
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
