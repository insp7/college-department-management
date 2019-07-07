@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/student-courses"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/student-courses/create">Student Courses</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Student Course</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Edit Student Course</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/student-courses/{{ $student_course->id }}">
                        @csrf
                        @method('PATCH');

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror">{{ $student_course->name }}</textarea>
                            </div>
                            @error('name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="details" placeholder="Details" class="form-control @error('details') is-invalid @enderror">{{ $student_course->details }}</textarea>
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="location" placeholder="Location" class="form-control @error('location') is-invalid @enderror">{{ $student_course->location }}</textarea>
                            </div>
                            @error('location')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-daterange datepicker row align-items-center" data-provide="datepicker"
                        data-date-format="yyyy/mm/dd" data-orientation="top auto" aria-orientation="vertical">
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" name="start_date" placeholder="Start date" value="{{ $student_course->start_date }}" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" name="end_date" placeholder="End date" value="{{ $student_course->end_date }}" type="text">
                                </div>
                            </div>
                        </div>
                    </div>

                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("/js/shape/add-shape.js") }}"></script>
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
