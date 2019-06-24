@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home"><i class="fas fa-user"></i></a></li>
    <li class="breadcrumb-item"><a href="/staff">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Fill Details</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Details</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/staff">
                        @csrf

                        <div class="form-group has-danger">
                            <label class="form-control-label" for="validationServer03">City</label>
                            <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required="">
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('first_name') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <input  value="{{ old('first_name') }}" required name="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror">
                            </div>
                            @error('first_name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('middle_name') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <input  value="{{ old('middle_name') }}" required name="middle_name" type="text" placeholder="Middle Name" class="form-control @error('middle_name') is-invalid @enderror">
                            </div>
                            @error('middle_name')
                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge @error('last_name') has-danger @enderror">
                                <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <input  value="{{ old('last_name') }}" required name="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror">
                            </div>
                            @error('last_name')
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
