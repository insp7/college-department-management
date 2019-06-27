@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home"><i class="fas fa-user"></i></a></li>
    <li class="breadcrumb-item"><a href="/staff">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
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

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('first_name') }}" required name="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror">
                                    @error('first_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('middle_name') }}" required name="middle_name" type="text" placeholder="Middle Name" class="form-control @error('middle_name') is-invalid @enderror">
                                    @error('middle_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('last_name') }}" required name="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror">
                                    @error('last_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('contact_no') }}" required name="contact_no" type="number" placeholder="Contact Number"  class="form-control @error('contact_no') is-invalid @enderror">
                                    @error('contact_no')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" value="{{ old('date_of_birth') }}" required name="date_of_birth" type="date" placeholder="Date of Birth"  class="form-control @error('date_of_birth') is-invalid @enderror">
                                    @error('date_of_birth')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- TODO REPLACE WITH<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2019">
                                </div>
                            </div>--}}


                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Other</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group input-group-merge @error('password') has-danger @enderror">
                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-key"></i> </span> </div> <input required name="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group input-group-merge @error('password') has-danger @enderror">
                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-key"></i> </span> </div> <input required name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('pan') }}" required name="pan" type="number" placeholder="Pan Number"  class="form-control @error('pan') is-invalid @enderror">
                                    @error('pan')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" value="{{ old('date_of_joining_institue') }}" required name="date_of_joining_institue" type="date" placeholder="Date of Birth"  class="form-control @error('date_of_joining_institue') is-invalid @enderror">
                                    @error('date_of_joining_institue')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('employee_id') }}" required name="employee_id" type="number" placeholder="Employee Id"  class="form-control @error('employee_id') is-invalid @enderror">
                                    @error('employee_id')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <div class="col-md-4">
                                <div class="col-md-6">
                                    <input type="checkbox" value="1">Teaching
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" value="1">Permanent
                                </div>
                            </div>

                        </div>

                        <hr>



                        <div class="row">

                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Chairman BOS</label> <input type="checkbox" value="1">

                                <div hidden>
                                <div class="form-group">
                                    <div class="input-group input-group-merge @error('last_name') has-danger @enderror">
                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <input  value="{{ old('first_name') }}" required name="first_name" type="file" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror">
                                    </div>
                                    @error('last_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-merge @error('last_name') has-danger @enderror">
                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <textarea  value="{{ old('first_name') }}" required name="first_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror"></textarea>
                                    </div>
                                    @error('last_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>

                                </div>


                            </div>

                            <div class="col-md-6">
                                <label for="">Member BOS</label>

                                <div class="form-group">
                                    <div class="input-group input-group-merge @error('last_name') has-danger @enderror">
                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <input  value="{{ old('first_name') }}" required name="first_name" type="file" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror">
                                    </div>
                                    @error('last_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-merge @error('last_name') has-danger @enderror">
                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-user"></i> </span> </div> <textarea  value="{{ old('first_name') }}" required name="first_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror"></textarea>
                                    </div>
                                    @error('last_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>


                        </div>


                        <div class="row button-group">

                            <div class="col-md-4">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>

                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div

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
