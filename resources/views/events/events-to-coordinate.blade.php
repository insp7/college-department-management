@extends('layouts.base')

@section('custom-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
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
                            <th> Edit </th>
                            <th>View Images</th>
                            <th>Publish as news</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->details }}. Address: {{ $event->address }}</td>
                                    <td>{{ $event->type }}</td>
                                    <td>{{ $event->institute_funding + $event->sponsor_funding }}. (Institute: {{ $event->institute_funding }}, Sponsor: {{ $event->sponsor_funding }})</td>
                                    <td>{{ $event->start_date }} TO {{ $event->end_date }}</td>
                                    <td>{{ $event->internal_participants_count + $event->external_participants_count }}. (Internal: {{ $event->internal_participants_count }}, External: {{ $event->external_participants_count }})</td>
                                    <td><button id="{{ $event->id }}" class="edit fa fa-pencil-alt btn-sm btn-warning"></button></td>
                                    <td><button id="{{ $event->id }}" class="view-images fa fa-eye btn-sm btn-success"></button></td>
                                    <td><button id="{{ $event->id }}" class="publish fa fa-book-reader btn-sm btn-primary"></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Details</th> <!-- $details. Address: $address -->
                            <th>Type</th>
                            <th>Funding</th> <!-- $total_funding. (institute: $institute_funding, sponsor: $sponsor_funding) -->
                            <th>Duration</th> <!-- Started from: $start_date. Ended on $end_date -->
                            <th>Total Participants</th> <!-- $internal + $external. (Internal: $internal. External: $external) -->
                            <th>Edit</th>
                            <th>View Images</th>
                            <th>Publish as news</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')

    <script>
        let manageEventsTable = $('#events-list');

        manageEventsTable.on('click', '.edit', function () {
            $id = $(this).attr('id');
            window.location.pathname = '/events/end-event/' + $id + '/end';
        });
        
        manageEventsTable.on('click', '.view-images', function () {
            $id = $(this).attr('id');
            window.location.pathname = '/events/images/' + $id + '/show';
        });

        manageEventsTable.on('click', '.publish', function () {
            $id = $(this).attr('id');
            window.location.pathname = '/events/' + $id + '/publish-as-news/';
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
