@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/sachievement"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/sachievement">Staff Achievements</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Achievement</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Edit Achievement</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/sachievement/{{ $sachievement->id }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('achievement_name') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text">
                                        <i class="ni ni-paper-diploma"></i></span>
                                </div>
                                <input value="{{ $sachievement->achievement_name }}" required name="achievement_name" type="text" placeholder="Name of the achievement" class="form-control @error('achievement_name') is-invalid @enderror">
                            </div>
                            @error('achievement_name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('achievement_description') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text">
                                        <i class="ni ni-paper-diploma"></i></span>
                                </div>
                                <input value="{{$sachievement->achievement_description}}" required name="achievement_description" type="text" placeholder="Description of the achievement" class="form-control @error('achievement_description') is-invalid @enderror">
                            </div>
                            @error('achievement_description')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group @error('year') has-danger @enderror">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input type="text" value="{{ $sachievement->year }}" required name="year" id="year"  placeholder="Year of the achievement" data-date-format="yyyy"  class="form-control datepicker @error('year') is-invalid @enderror">
                            </div>
                            @error('year')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class=" @error('file') has-danger @enderror">
                                <label for=""> Please Delete Achievement and again to add new Image.</label><br>
                                <img src="{{ $sachievement->media->image_path }}" height="150px"  width='100px' class="image">
                            </div>
                            @error('year')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset("/js/shape/add-shape.js") }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $("#year").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
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
