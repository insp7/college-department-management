@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/ipr"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/ipr/create">IPR</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add IPR</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Edit IPR</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="/ipr/{{ $ipr->id }}">
                        @csrf
                        @method('PATCH');

                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" value="{{ $ipr->year }}"  name="year" placeholder="Year" class="form-control @error('year') is-invalid @enderror"></input>
                            </div>
                            @error('year')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="patents_published_count" placeholder="Patents Published Count" class="form-control @error('patents_published_count') is-invalid @enderror">{{ $ipr->patents_published_count }}</textarea>
                            </div>
                            @error('patents_published_count')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="patents_granted_count" placeholder="Patents Granted Count" class="form-control @error('patents_granted_count') is-invalid @enderror">{{ $ipr->patents_granted_count }}</textarea>
                            </div>
                            @error('patents_granted_count')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="additional_columns" placeholder="additional_columns" class="form-control @error('additional_columns') is-invalid @enderror">{{ $ipr->additional_columns }}</textarea>
                            </div>
                            @error('additional_columns')
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
