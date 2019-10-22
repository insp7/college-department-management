@extends('layouts.base')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-newspaper"></i></a></li>
<li class="breadcrumb-item"><a href="/staff-events">Staff Event</a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Staff Event</li>
@endsection

@section('page-content')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Edit Staff Event</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form method="POST" action="/staff-events/{{ $staff->id }}" enctype="multipart/form-data" id="frmTarget">

                    @csrf
                    @method("PATCH")

                    <div class="input-daterange datepicker" data-provide="datepicker" data-date-format="mm/dd/yyyy" data-orientation="top auto" aria-orientation="vertical">
                        <div class="form-group">
                            <div class="input-group @error('date') has-danger @enderror">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <script>
                                    $('.datepicker').datepicker({
                                        orientation: "top"
                                    });
                                </script>
                                <input class="form-control datepicker" type="text" autocomplete="off" value="{{ $staff->date }}" name="date" placeholder="Date of Event">
                                @error('date')
                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-merge @error('name_of_event') has-danger @enderror">
                            <div class="input-group-prepend"> <span class="input-group-text">
                             <i class="fa fa-newspaper"></i> </span> </div> 
                             <input value="{{ $staff->name_of_event }}" required name="name_of_event" type="name_of_event" placeholder="Name of Event" class="form-control @error('name_of_event') is-invalid @enderror">
                        </div>
                        @error('name_of_event')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-daterange datepicker" data-provide="datepicker" data-date-format="yyyy/mm/dd" data-orientation="top auto" aria-orientation="vertical">
                        <div class="form-group">
                            <div class="input-group @error('start_date') has-danger @enderror">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <script>
                                    $('.datepicker').datepicker({
                                        orientation: "top"
                                    });
                                </script>
                                <input class="form-control datepicker" type="text" autocomplete="off" value="{{ $staff->start_date }}" name="start_date" placeholder="Start Date of Event">
                                @error('start_date')
                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="input-daterange datepicker" data-provide="datepicker" data-date-format="yyyy/mm/dd" data-orientation="top auto" aria-orientation="vertical">
                        <div class="form-group">
                            <div class="input-group @error('end_date') has-danger @enderror">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <script>
                                    $('.datepicker').datepicker({
                                        orientation: "top"
                                    });
                                </script>
                                <input class="form-control datepicker" type="text" autocomplete="off" value="{{ $staff->end_date }}" name="end_date" placeholder="End Date of Event">
                                @error('date')
                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="type" id="choose-type" required class="form-control @error('type') is-invalid @enderror">
                            <option disabled selected>Select Type of Event</option>
                            <option value="FDP" @if($staff->type == 'FDP') selected @endif>FDP</option>
                            <option value="STTP" @if($staff->type == 'STTP') selected @endif>STTP</option>
                            <option value="Conference" @if($staff->type == 'Conference') selected @endif>Conference</option>
                            <option value="Orientation" @if($staff->type == 'Orientation') selected @endif>Orientation</option>
                        </select>
                        @error('type')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <br>

                    <button class="btn btn-primary" type="sumbit">Edit</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section ('custom-script')
<script src="{{asset('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $('.datepicker').datepicker({
        orientation: "top"
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
