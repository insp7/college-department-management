@foreach($staff_details as $staff_detail)

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
                    <form method="post" action="/admin/staff/{{ $staff->user_id }}">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name" class="text-xs">First Name</label>
                                    <input  value="{{ $staff_detail->first_name }}" required name="first_name" id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror">
                                    @error('first_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="middle_name" class="text-xs">Middle Name</label>
                                    <input  value="{{ $staff_detail->middle_name }}" id="middle_name" required name="middle_name" type="text" placeholder="Middle Name" class="form-control @error('middle_name') is-invalid @enderror">
                                    @error('middle_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name" class="text-xs">Last Name</label>
                                    <input  value="{{ $staff_detail->last_name }}" id="last_name" required name="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror">
                                    @error('last_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact_no" class="text-xs">Contact No</label>
                                    <input  value="{{ $staff_detail->contact_no }}" id="contact_no" required name="contact_no" type="number" placeholder="Contact Number"  class="form-control @error('contact_no') is-invalid @enderror">
                                    @error('contact_no')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_of_birth" class="text-xs">Date of Birth</label>
                                    <input type="date" value="{{ $staff_detail->date_of_birth }}" id="date_of_birth" required name="date_of_birth" type="date" placeholder="Date of Birth"  class="form-control @error('date_of_birth') is-invalid @enderror">
                                    @error('date_of_birth')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender" class="text-xs">Gender</label>
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option @if($staff_detail->gender == 'M')
                                                    {{ 'selected' }}
                                                @endif
                                                value="M">Male</option>
                                        <option @if($staff_detail->gender == 'F')
                                                    {{ 'selected' }}
                                                @endif
                                                value="F">Female</option>
                                        <option @if($staff_detail->gender == 'O')
                                                    {{ 'selected' }}
                                                @endif
                                                value="O">Other</option>
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
                                    <label for="pan" class="text-xs">Pan Number</label>
                                    <input  value="{{ $staff->pan }}" id="pan" required name="pan" type="number" placeholder="Pan Number"  class="form-control @error('pan') is-invalid @enderror">
                                    @error('pan')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="employee_id" class="text-xs">Employee Id</label>
                                    <input  value="{{ $staff->employee_id }}" id="employee_id" required name="employee_id" type="number" placeholder="Employee Id"  class="form-control @error('employee_id') is-invalid @enderror">
                                    @error('employee_id')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


{{--                            <div class="col-md-4">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="checkbox" value="1"--}}
{{--                                    @if($staff->is_teaching == 1)--}}
{{--                                        {{ 'checked' }}--}}
{{--                                    @endif--}}
{{--                                    > Teaching--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="checkbox" value="1"--}}
{{--                                    @if($staff->is_permanent == 1)--}}
{{--                                        {{ 'checked' }}--}}
{{--                                    @endif--}}
{{--                                    > Permanent--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>

                        <hr>

                        <button class="btn btn-primary" type="submit">Update</button>

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

@endforeach
