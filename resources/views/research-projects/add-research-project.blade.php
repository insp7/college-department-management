@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/research-projects"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/research-projects/create">Research Projects</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Research Projects</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Research Project</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/research-projects">
                        @csrf

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('principal_investigator') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text">
                                        <i class="fa fa-user"></i></span>
                                </div>
                                <input value="{{ old('principal_investigator') }}" required name="principal_investigator" type="text" placeholder="Principal investigator" class="form-control @error('principal_investigator') is-invalid @enderror">
                            </div>
                            @error('principal_investigator')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('grant_details') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text">
                                        <i class="ni ni-collection  "></i></span>
                                </div>
                                <input value="{{ old('grant_details') }}" required name="grant_details" type="text" placeholder="Grant Details" class="form-control @error('grant_details') is-invalid @enderror">
                            </div>
                            @error('grant_details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('title') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text">
                                        <i class="fa fa-book"></i></span>
                                </div>
                                <input value="{{ old('title') }}" required name="title" type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror">
                            </div>
                            @error('title')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('amount') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text">
                                        <i class="fa fa-rupee-sign"></i></span>
                                </div>
                                <input value="{{ old('amount') }}" required name="amount" type="text" placeholder="Amount" class="form-control @error('amount') is-invalid @enderror">
                            </div>
                            @error('amount')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group @error('year') has-danger @enderror">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input type="text" value="{{ old('year') }}" required name="year"  placeholder="Date of Research Project" data-date-format="yyyy/mm/dd"  class="form-control datepicker @error('year') is-invalid @enderror">
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
