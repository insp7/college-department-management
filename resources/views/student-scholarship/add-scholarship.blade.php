@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/student-scholarships"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/student-scholarships">Scholarships</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Scholarships</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Scholarship</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/student-scholarships">
                        @csrf

                            <div class="form-group">
                                 <input type="text"  value="{{ old('details') }}" autocomplete="off" name="details" placeholder="Details about Scholarship" class="form-control @error('details') is-invalid @enderror" required>
                                @error('details')
                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                 <input type="text"  value="{{ old('sponsors_name') }}" autocomplete="off" required name="sponsors_name"  placeholder="Sponsoror's Name" class="form-control @error('sponsors_name') is-invalid @enderror">
                            @error('sponsors_name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                                 <input type="text"  value="{{ old('amount') }}" autocomplete="off" required name="amount"  placeholder="Amount of Scholarship" class="form-control @error('amount') is-invalid @enderror">
                            @error('amount')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="input-daterange datepicker" data-provide="datepicker" data-date-format="yyyy/mm/dd" data-orientation="top auto" aria-orientation="vertical">
                                <div class="form-group">
                                    <div class="input-group @error('year') has-danger @enderror">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <script>
                                        $('.datepicker').datepicker({
                                            orientation: "top"
                                        });
                                        </script>
                                        <input class="form-control datepicker" type="text" autocomplete="off" value="{{ old('year') }}" name="year" placeholder="Year of Scholarship">
                                    @error('year')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                             </div>

                            <div class="custom-control custom-radio mb-3">
                                 <input class="custom-control-input" id="private" type="radio" required name="isPrivate" value="1" class="form-control @error('details') is-invalid @enderror">
                                 <label class="custom-control-label" for="private">Private</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                            <input class="custom-control-input" id="government" type="radio" required name="isPrivate" value="0" class="form-control @error('details') is-invalid @enderror">
                            <label class="custom-control-label" for="government">Government</label>
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror

                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset('/js/shape/add-shape.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

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
