@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/publications"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/publications/create">Publications</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Publications</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Publications</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/publications" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" value="{{ old('year') }}"  name="year" placeholder="Year" class="form-control datepicker @error('year') is-invalid @enderror" />
                            </div>
                            @error('year')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('citation') }}"  name="citation" placeholder="Citation" class="form-control @error('citation') is-invalid @enderror"></textarea>
                            </div>
                            @error('citation')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('additional_columns') }} " required  name="additional_columns"  placeholder="additional_columns" class="form-control @error('additional_columns') is-invalid @enderror"></textarea>
                            </div>
                            @error('additional_columns')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="file"  value="{{ old('file') }}"  name="file"  placeholder="file" class="form-control @error('file') is-invalid @enderror"/>
                            </div>
                            @error('file')
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
