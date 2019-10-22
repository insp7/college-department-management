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
                    <h3 class="mb-0">Add Achievement</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/sachievement/{{ $sachievement->id }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('achievement_name') }}"  name="achievement_name"  placeholder="Name of the achievement" class="form-control @error('achievement_name') is-invalid @enderror">{{$sachievement->achievement_name}}</textarea>
                            </div>
                            @error('achievement_name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('achievement_description') }}"  name="achievement_description"  placeholder="Description about the achievement" class="form-control @error('description') is-invalid @enderror">{{ $sachievement->achievement_description}}</textarea>
                            </div>
                            @error('grant_details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('year') }}"  name="year"  placeholder="Year of the achievement" class="form-control @error('year') is-invalid @enderror">{{ $sachievement->year }}</textarea>
                            </div>
                            @error('grant_details')
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
