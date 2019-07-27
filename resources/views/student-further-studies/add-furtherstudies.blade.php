@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/student-further-studies"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/student-further-studies">Further Studies Information</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Further Studies Information</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Further Studies Information</h3>
                </div>
                <!-- Card body -->

                <div class="card-body">
                    <form method="post" action="/student-further-studies">
                        @csrf

                        <div class="form-group">
                            <h4 class="mb-0 pb-2">Have You Opted For Further Studies?</h4>
                            <div class="custom-control custom-radio mb-3">
                                    <input class="custom-control-input" id="opted" type="radio" required name="hasOpted" value="1" class="form-control @error('hasOpted') is-invalid @enderror">
                                    <label class="custom-control-label" for="opted">Yes</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input class="custom-control-input" id="notopted" type="radio" required name="hasOpted" value="0" class="form-control @error('hasOpted') is-invalid @enderror">
                                <label class="custom-control-label" for="notopted">No</label>
                            </div>
                            @error('hasOpted')
                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div disabled="true"><p>HELLO</p></div>
                        <div class="form-group">
                            <select name="type" id="" required class="form-control @error('type') is-invalid @enderror">
                                <option disabled selected>Select Your Exam</option>
                                <option value="MS" @if(old('type') == 'MS') selected @endif>MS</option>
                                <option value="MTech" @if(old('type') == 'MTech') selected @endif>MTech</option>
                                <option value="ME" @if(old('type') == 'ME') selected @endif>ME</option>
                                <option value="MBA" @if(old('type') == 'MBA') selected @endif>MBA</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                                <input type="text" value="{{ old('obtained') }}" autocomplete="off" required name="obtained"  placeholder="Marks Obtained" class="form-control @error('obtained') is-invalid @enderror">
                            @error('obtained')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                                <input type="text" value="{{ old('outof') }}" autocomplete="off" required name="outof"  placeholder="Marks obtained Out Of" class="form-control @error('outof') is-invalid @enderror">
                            @error('outof')
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
    <script src="{{ asset('/js/shape/add-shape.js') }}"></script>

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
