@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin/admin/events"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/admin/admin/events/create">Events</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Events</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Events</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/admin/events">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('name') }}"  name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror"></textarea>
                            </div>
                            @error('name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('details') }}"  name="details" placeholder="Details" class="form-control @error('details') is-invalid @enderror"></textarea>
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('address') }}"  name="address" placeholder="Address" class="form-control @error('address') is-invalid @enderror"></textarea>
                            </div>
                            @error('address')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('type') }}"  name="type" placeholder="Type" class="form-control @error('type') is-invalid @enderror"></textarea>
                            </div>
                            @error('type')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" value="{{ old('start_date') }}"  name="start_date" placeholder="Start Date" class="form-control @error('start_date') is-invalid @enderror"></input>
                            </div>
                            @error('start_date')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" value="{{ old('end_date') }}"  name="end_date" placeholder="End Date" class="form-control @error('end_date') is-invalid @enderror"></input>
                            </div>
                            @error('end_date')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Add Event</button>
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
