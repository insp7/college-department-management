@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home"><i class="fas fa-user"></i></a></li>
    <li class="breadcrumb-item"><a href="/staff">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Staff</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Add Staff</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/admin/staff">
                        @csrf

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('email') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <input  value="{{ old('email') }}" required name="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                            </div>
                            @error('email')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('password') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-key"></i> </span> </div> <input required name="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                            </div>
                            @error('password')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('title') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-key"></i> </span> </div> <input required name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control">
                            </div>
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
