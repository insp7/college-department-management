@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/published-books"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/published-books/create">Published Books</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Published Books</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Published Book</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/published-books">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <textarea  value="{{ old('details') }}" required name="details"  placeholder="Details about book" class="form-control @error('details') is-invalid @enderror"></textarea>
                            </div>
                            @error('details')
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
