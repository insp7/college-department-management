@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/student-further-studies"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/student-further-studies/create">Add Further Studies Information</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Further Studies Information</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Edit Further Studies Information</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="/student-further-studies/{{ $student->id }}">
                        @csrf
                        @dd($student->id)
                        {{ method_field("PATCH") }}
                        <!-- @method("PATCH") -->

                        <div class="form-group">
                            <h4 class="mb-0 pb-2">Have You Opted For Further Studies?</h4>
                            <div class="custom-control custom-radio mb-3">
                                    <input class="custom-control-input" id="opted" type="radio" required name="hasOpted" value="1" class="form-control @error('hasOpted') is-invalid @enderror" {{$student->hasOpted===1?'checked':''}}>
                                    <label class="custom-control-label" for="opted">Yes</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input class="custom-control-input" id="notopted" type="radio" required name="hasOpted" value="0" class="form-control @error('hasOpted') is-invalid @enderror" {{$student->hasOpted===0?'checked':''}}>
                                <label class="custom-control-label" for="notopted">No</label>
                            </div>
                            @error('hasOpted')
                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="type" id="choose-type" disabled="disabled" required class="form-control @error('type') is-invalid @enderror">
                                <option disabled selected>Select Your Exam</option>
                                <option value="MS" @if($student->type == 'MS') selected @endif>MS</option>
                                <option value="MTech" @if($student->type == 'MTech') selected @endif>MTech</option>
                                <option value="ME" @if($student->type == 'ME') selected @endif>ME</option>
                                <option value="MBA" @if($student->type == 'MBA') selected @endif>MBA</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" id="given-exam" hidden="true">
                            <h4 class="mb-0 pb-2">Have You Given the Exam?</h4>
                            <div class="custom-control custom-radio mb-3">
                                    <input class="custom-control-input" id="given" type="radio" disabled="disabled" required name="hasGiven" value="1" class="form-control @error('hasGiven') is-invalid @enderror" {{$student->hasGiven===1?'checked':''}}>
                                    <label class="custom-control-label" for="given">Yes</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input class="custom-control-input" id="notgiven" type="radio" disabled="disabled" required name="hasGiven" value="0" class="form-control @error('hasGiven') is-invalid @enderror" {{$student->hasGiven===1?'checked':''}}>
                                <label class="custom-control-label" for="notgiven">No</label>
                            </div>
                            @error('hasGiven')
                                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                                <input type="text" value="{{ $student->obtained }}" disabled="disabled" autocomplete="off" required name="obtained" id="obtained" placeholder="Marks Obtained" class="form-control @error('obtained') is-invalid @enderror">
                            @error('obtained')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                                <input type="text" value="{{ $student->outof }}" disabled="disabled" autocomplete="off" required name="outof" id="outof" placeholder="Marks obtained Out Of" class="form-control @error('outof') is-invalid @enderror">
                            @error('outof')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset('/js/shape/add-shape.js') }}"></script>
    <script>
        $('#choose-type').hide();
        $('input[name="hasOpted"]').on('click', function (event) {
            var text = $(this).val();

        if (text === '1') {
            $('#choose-type').show();
            $('#choose-type').prop('disabled', false);
            $('#given-exam').prop('hidden', false);
            $('#given').prop('disabled', false);
            $('#notgiven').prop('disabled', false);
        } else {
            $('#choose-type').prop('disabled', true);
            $('#choose-type').hide();
            }
        });
    </script>
        <script>
        $('#obtained').hide();
        $('#outof').hide();
        $('input[name="hasGiven"]').on('click', function (event) {
            var text = $(this).val();
            
        if (text === '1') {
            $('#obtained').show();
            $('#obtained').prop('disabled', false);
            $('#outof').show();
            $('#outof').prop('disabled', false);
        } else {
            $('#obtained').prop('disabled', true);
            $('#obtained').hide();
            $('#outof').prop('disabled', true);
            $('#outof').hide();
        }
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
