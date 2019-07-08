@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/scholarships"><i class="fas fa-book"></i></a></li>
    <li class="breadcrumb-item"><a href="/scholarships/create">Scholarships</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Scholarships</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Scholarship</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/scholarships">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                 <textarea  value="{{ old('details') }}" required name="details"  placeholder="Details about Scholarship" class="form-control @error('details') is-invalid @enderror"></textarea>
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                            <br>

                            <div class="input-group">
                                 <textarea  value="{{ old('sponsors_name') }}" required name="sponsors_name"  placeholder="Sponsoror's Name" class="form-control @error('details') is-invalid @enderror"></textarea>
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                            <br>

                            <div class="input-group">
                                 <textarea  value="{{ old('amount') }}" required name="amount"  placeholder="Amount of Scholarship" class="form-control @error('details') is-invalid @enderror"></textarea>
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                            <br>

                            <div class="input-group">
                                 <textarea  value="{{ old('year') }}" required name="year"  placeholder="Year of Scholarship" class="form-control @error('details') is-invalid @enderror"></textarea>
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                            <br>

                            <div class="input-group">
                                 <input type="radio" required name="isPrivate" value="1" class="form-control @error('details') is-invalid @enderror">Private<br>
                                 <input type="radio" required name="isPrivate" value="0" class="form-control @error('details') is-invalid @enderror">Government
                            </div>
                            @error('details')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                            <br>

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
