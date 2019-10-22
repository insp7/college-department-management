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
                    <h3 class="mb-0">Edit Research Projects</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/research-projects/{{ $research_project->id }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="principal_investigator" placeholder="Principal Investigator" class="form-control @error('principal_investigator') is-invalid @enderror">{{ $research_project->principal_investigator }}</textarea>
                            </div>
                            @error('principal_investigator')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="grant_details" placeholder="Grant Details" class="form-control @error('grant_details') is-invalid @enderror">{{ $research_project->grant_details }}</textarea>
                            </div>
                            @error('grant_details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="title" placeholder="Title" class="form-control @error('title') is-invalid @enderror">{{ $research_project->title }}</textarea>
                            </div>
                            @error('title')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="amount" placeholder="Amount" class="form-control @error('amount') is-invalid @enderror">{{ $research_project->amount }}</textarea>
                            </div>
                            @error('amount')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" value="{{ $research_project->year }}"  name="year" placeholder="Year" class="form-control @error('year') is-invalid @enderror"></input>
                            </div>
                            @error('year')
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
