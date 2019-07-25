@extends('layouts.base')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-newspaper"></i></a></li>
<li class="breadcrumb-item"><a href="/student-internship">Internship</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Internship</li>
@endsection

@section('page-content')
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Add Internship</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form method="POST" action="/student-internship" enctype="multipart/form-data" id="frmTarget">

                    @csrf
                    <div class="form-group">
                        <div class="input-group input-group-merge @error('company_name') has-danger @enderror">
                            <div class="input-group-prepend"> <span class="input-group-text"> <i
                                        class="fa fa-newspaper"></i> </span> </div> <input value="{{ old('company_name') }}"
                                required name="company_name" type="company_name" placeholder="Company Name"
                                class="form-control @error('company_name') is-invalid @enderror">
                        </div>
                        @error('company_name')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>



                    <div>
                        <div class="custom-control custom-radio custom-control-inline mb-3">
                            <input type="radio" required id="is_paid1" name="is_paid" class="custom-control-input" value='0'>
                            <label class="custom-control-label" for="is_paid1">Unpaid</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" required id="is_paid" name="is_paid" class="custom-control-input" value='1'>
                            <label class="custom-control-label" for="is_paid">Paid</label>
                        </div>
                    </div>
                    @error('is_paid')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                    @enderror

                    <div class="input-daterange datepicker row align-items-center" data-provide="datepicker"
                        data-date-format="yyyy/mm/dd" data-orientation="top auto" aria-orientation="vertical">
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" name="start_date" placeholder="Start date" value="{{old('start_date')}}" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control" name="end_date" placeholder="End date" value="{{old('end_date')}}" type="text" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('end_date')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                    @enderror
                    @error('start_date')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                    @enderror



                    <div class="form-group">
                        <input type="file" required name="student_internship_image"
                            class="form-control @error('student_internship_image') is-invalid @enderror">
                        @error('student_internship_image')
                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                        @enderror
                    </div>

                    <br>


                    <button class="btn btn-primary" type="sumbit" id="createInternshipBtn">Create</button>




                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section ('custom-script')
<script src="{{asset('/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script>
    $('.datepicker').datepicker({
        orientation: "top"
    });

</script>

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
