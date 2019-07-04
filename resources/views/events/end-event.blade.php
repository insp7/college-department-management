@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/events"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/events/create">Events</a></li>
    <li class="breadcrumb-item active" aria-current="page">End Event</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">End Event</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/events/end/{{ $event->id }}">
                        @csrf

                        <div class="form-group">
                            <label for="institute_funding">Institute Funding</label>
                            <div class="input-group">
                                <textarea id="institute_funding" name="institute_funding" placeholder="Institute Funding" class="form-control @error('institute_funding') is-invalid @enderror">{{ $event->institute_funding }}</textarea>
                            </div>
                            @error('institute_funding')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sponsor_funding">Sponsor Funding</label>
                            <div class="input-group">
                                <textarea id="sponsor_funding" name="sponsor_funding" placeholder="Sponsor Funding" class="form-control @error('sponsor_funding') is-invalid @enderror">{{ $event->sponsor_funding }}</textarea>
                            </div>
                            @error('sponsor_funding')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="expenditure">Expenditure</label>
                            <div class="input-group">
                                <textarea id="expenditure" name="expenditure" placeholder="Expenditure" class="form-control @error('expenditure') is-invalid @enderror">{{ $event->expenditure }}</textarea>
                            </div>
                            @error('expenditure')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="internal_participants_count">Internal Participants Count</label>
                            <div class="input-group">
                                <textarea id="internal_participants_count" name="internal_participants_count"  placeholder="Internal Participants Count" class="form-control @error('internal_participants_count') is-invalid @enderror">{{ $event->internal_participants_count }}</textarea>
                            </div>
                            @error('internal_participants_count')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="external_participants_count">External Participants Count</label>
                            <div class="input-group">
                                <textarea id="external_participants_count" name="external_participants_count"  placeholder="External Participants Count" class="form-control @error('external_participants_count') is-invalid @enderror">{{ $event->external_participants_count }}</textarea>
                            </div>
                            @error('external_participants_count')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="event_images">Event Images</label>
                            <div class="input-group">
                                <input type="file" id="event_images" name="event_images[]"  placeholder="Event Images" multiple="multiple" class="form-control @error('event_images') is-invalid @enderror"></input>
                            </div>
                            @error('event_images')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">End Event</button>
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
