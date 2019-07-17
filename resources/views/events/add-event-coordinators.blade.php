<?php
////dd($assigned_coordinators);
//$coordinators = json_encode($assigned_coordinators, true);
//$coordinators = json_decode($coordinators, true);
//
//foreach ($coordinators as $coordinator) {
//    echo $coordinator['email'];
//}
//?>
@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin/admin/events"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/admin/admin/events/create">Events</a></li>
    <li class="breadcrumb-item active" aria-current="page">Assign Co-ordinator</li>
@endsection

@section('page-content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css">

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Assign Co-ordinator</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    @if(!empty($unassigned_coordinators))

                        <form method="post" action="/admin/events/{{ $event_id }}/coordinators/add">
                            @csrf
                            <div class="form-group">
                                <select id="add-event-coordinator" name="event_coordinators[]" multiple="multiple">
                                        @foreach($unassigned_coordinators as $unassigned_coordinator)
                                            <option value="{{ $unassigned_coordinator->id }}">{{ $unassigned_coordinator->first_name . $unassigned_coordinator->last_name }}</option>
                                        @endforeach
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit">Add Coordinator</button>
                        </form>
                    @else
                        <p>All existing coordinators are already assigned to this event. No coordinator remaining to add!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("/js/shape/add-shape.js") }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    @if(session()->has('type'))
        <script>
            alert()
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

    <script>
        $(document).ready(function() {
            $('#add-event-coordinator').select2();
        });
    </script>
@endsection
