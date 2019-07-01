@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/publications"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/publications/create">Events</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Event</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Edit Events</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/admin/events/{{ $event->id }}">
                        @csrf
                        @method('PATCH');

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror">{{ $event->name }}</textarea>
                            </div>
                            @error('name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="details" placeholder="Details" class="form-control @error('details') is-invalid @enderror">{{ $event->details }}</textarea>
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="address" placeholder="Address" class="form-control @error('address') is-invalid @enderror">{{ $event->address }}</textarea>
                            </div>
                            @error('address')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="type" placeholder="Type" class="form-control @error('type') is-invalid @enderror">{{ $event->type  }}</textarea>
                            </div>
                            @error('type')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" value="{{ $event->start_date }}" name="start_date" placeholder="Start Date" class="form-control @error('start_date') is-invalid @enderror">
                            </div>
                            @error('start_date')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" value="{{ $event->end_date }}"  name="end_date" placeholder="End Date" class="form-control @error('end_date') is-invalid @enderror"></input>
                            </div>
                            @error('end_date')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" value="{{ $event->institute_funding }}" name="institute_funding" placeholder="Institute funding" class="form-control @error('institute_funding') is-invalid @enderror">
                            </div>
                            @error('institute_funding')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" value="{{ $event->sponsor_funding }}" name="sponsor_funding" placeholder="Sponsor funding" class="form-control @error('sponsor_funding') is-invalid @enderror">
                            </div>
                            @error('sponsor_funding')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" value="{{ $event->expenditure }}" name="expenditure" placeholder="Expenditure" class="form-control @error('expenditure') is-invalid @enderror">
                            </div>
                            @error('expenditure')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" value="{{ $event->internal_participants_count  }}" name="internal_participants_count" placeholder="Internal Participants Count" class="form-control @error('internal_participants_count') is-invalid @enderror">
                            </div>
                            @error('internal_participants_count')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" value="{{ $event->external_participants_count  }}" name="external_participants_count" placeholder="External Participants Count" class="form-control @error('external_participants_count') is-invalid @enderror">
                            </div>
                            @error('external_participants_count')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="additional_columns"  placeholder="additional_columns" class="form-control @error('additional_columns') is-invalid @enderror">{{ $event->additional_columns }}</textarea>
                            </div>
                            @error('additional_columns')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

{{--                        Add checkbox for if event is completed --}}

                        <button class="btn btn-primary" type="submit">Update Event</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("/js/shape/add-shape.js") }}"></script>

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
